<?php
// includes/mailer.php

require_once __DIR__ . '/env_loader.php';

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Pequeno helper: lê uma variável de ambiente com valor por defeito.
 * $_ENV[...] pode não existir se a chave estiver vazia no .env
 * (ex: SMTP_SECURE= vazio para MailHog), por isso usamos ?? com cuidado.
 */
function envValue(string $key, $default = null)
{
    $value = $_ENV[$key] ?? getenv($key);

    if ($value === false || $value === null) {
        return $default;
    }

    return $value;
}

/**
 * Monta e devolve uma instância de PHPMailer já configurada,
 * pronta a receber addAddress()/Subject/Body.
 *
 * Funciona tanto para MailHog local (sem auth, sem TLS) como
 * para Gmail em produção (com auth + TLS) — tudo controlado
 * pelas variáveis no .env, sem tocar em código.
 */
function getMailer(): PHPMailer
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = envValue('SMTP_HOST', '127.0.0.1');
    $mail->Port = (int) envValue('SMTP_PORT', 1025);

    $smtpAuth = filter_var(
        envValue('SMTP_AUTH', 'false'),
        FILTER_VALIDATE_BOOLEAN
    );

    $mail->SMTPAuth = $smtpAuth;

    if ($smtpAuth) {
        $mail->Username = envValue('SMTP_USERNAME');
        $mail->Password = envValue('SMTP_PASSWORD');
    }

    // MailHog não usa encriptação; produção (Gmail) usa 'tls'.
    // Se SMTP_SECURE vier vazio no .env, desativamos a encriptação.
    $secure = envValue('SMTP_SECURE', '');
    $mail->SMTPSecure = $secure !== '' ? $secure : false;

    if ($mail->SMTPSecure === false) {
        $mail->SMTPAutoTLS = false;
    }

    $mail->CharSet = 'UTF-8';
    $mail->Timeout = (int) envValue('MAIL_TIMEOUT', 30);
    $mail->SMTPDebug = (int) envValue('MAIL_DEBUG', 0);

    $mail->Debugoutput = function (string $str, int $level): void {
        error_log("PHPMailer [$level]: $str");
    };

    $mail->setFrom(
        envValue('FROM_EMAIL', 'no-reply@localhost'),
        envValue('FROM_NAME', 'STECH ENGENHARIA')
    );

    $mail->isHTML(false);

    return $mail;
}


function addRecipientsFromEnv(PHPMailer $mail, string $envKey = 'TO_EMAIL', string $default = 'info@stecheng.co.mz'): void
{
    $raw = envValue($envKey, $default);

    $emails = array_filter(array_map('trim', explode(',', $raw)));

    foreach ($emails as $email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail->addAddress($email);
        }
    }
}


function sendAutoReply(string $toEmail, string $toName, string $serviceType = ''): bool
{
    try {

        $mail = getMailer(); // nova instância, limpa, sem os destinatários internos

        $mail->addAddress($toEmail, $toName);

        $mail->Subject = 'Recebemos o seu pedido - STECH ENGENHARIA';

        $body_lines = [
            'Olá ' . $toName . ',',
            '',
            'Recebemos o seu pedido de orçamento' . ($serviceType !== '' ? ' sobre "' . $serviceType . '"' : '') . '.',
            '',
            'A nossa equipa vai analisar os detalhes e entrará em contacto em breve, geralmente dentro do horário comercial (Segunda a Sexta, 08h00-17h00).',
            '',
            'Se precisar de falar connosco imediatamente, pode ligar para +258 84 239 0756 ou pelo WhatsApp.',
            '',
            'Obrigado por contactar a STECH ENGENHARIA.',
        ];

        $mail->Body = implode("\r\n", $body_lines);

        $mail->send();

        return true;

    } catch (\Throwable $exception) {

        error_log('Falha ao enviar auto-resposta: ' . $exception->getMessage());

        return false;
    }
}
