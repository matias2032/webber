<?php
// includes/mailer.php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/config.php';

use PHPMailer\PHPMailer\PHPMailer;

function getMailer(): PHPMailer
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;

    $mail->SMTPAuth = SMTP_AUTH;

    if (SMTP_AUTH) {
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
    }

    $mail->SMTPSecure = SMTP_SECURE !== '' ? SMTP_SECURE : false;

    if ($mail->SMTPSecure === false) {
        $mail->SMTPAutoTLS = false;
    }

    $mail->CharSet = 'UTF-8';
    $mail->Timeout = MAIL_TIMEOUT;
    $mail->SMTPDebug = MAIL_DEBUG;

    $mail->Debugoutput = function (string $str, int $level): void {
        error_log("PHPMailer [$level]: $str");
    };

    $mail->setFrom(FROM_EMAIL, FROM_NAME);

    $mail->isHTML(false);

    return $mail;
}

function addRecipientsFromEnv(PHPMailer $mail, string $default = TO_EMAIL): void
{
    $emails = array_filter(array_map('trim', explode(',', $default)));

    foreach ($emails as $email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail->addAddress($email);
        }
    }
}

function sendAutoReply(string $toEmail, string $toName, string $serviceType = ''): bool
{
    try {
        $mail = getMailer();
        $mail->addAddress($toEmail, $toName);
        $mail->Subject = 'Recebemos o seu pedido - STECH ENGENHARIA';

        $body_lines = [
            'Olá ' . $toName . ',',
            '',
            'Recebemos o seu pedido de orçamento' . ($serviceType !== '' ? ' do(s) serviço(s) "' . $serviceType . '"' : '') . '.',
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