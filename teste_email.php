<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/includes/mailer.php';

echo '<pre>'; // formata melhor o debug SMTP no browser

try {

    $mail = getMailer();

    // ─────────────────────────────────────────────────────────
    // DETECTA O AMBIENTE REAL PELO QUE ESTÁ NO .env
    // (não confiar em texto fixo — isso é o que causava a
    // confusão: a mensagem dizia MailHog mesmo em produção)
    // ─────────────────────────────────────────────────────────

    $appEnv   = envValue('APP_ENV', 'production');
    $smtpHost = envValue('SMTP_HOST', '');
    $smtpAuth = filter_var(envValue('SMTP_AUTH', 'false'), FILTER_VALIDATE_BOOLEAN);

    // Heurística: é MailHog se não usa auth E o host é local/127.0.0.1
    $isMailHog = !$smtpAuth
        && in_array($smtpHost, ['127.0.0.1', 'localhost', 'mailhog'], true);

    $mail->addAddress(
        envValue('TO_EMAIL', 'info@stecheng.co.mz')
    );

    $mail->Subject = $isMailHog
        ? 'Teste de envio - MailHog (local)'
        : 'Teste de envio - PRODUÇÃO (' . $smtpHost . ')';

    $mail->Body = $isMailHog
        ? 'Se estás a ver isto no MailHog (http://localhost:8025), o SMTP local está OK.'
        : 'Este é um envio de PRODUÇÃO via ' . $smtpHost
            . '. Verifica a caixa real (' . envValue('TO_EMAIL') . '), '
            . 'incluindo a pasta de Spam, e confirma no Track Delivery do cPanel.';

    $mail->send();

    echo '</pre>';

    if ($isMailHog) {
        echo '<h2 style="color:green;">✅ Email enviado com sucesso (ambiente LOCAL/MailHog)!</h2>';
        echo '<p>Verifica em <a href="http://localhost:8025" target="_blank">http://localhost:8025</a></p>';
    } else {
        echo '<h2 style="color:orange;">✅ Email ACEITE pelo servidor SMTP de PRODUÇÃO (' . htmlspecialchars($smtpHost) . ')!</h2>';
        echo '<p>Isto <strong>não</strong> significa que chegou à caixa de destino — apenas que o servidor aceitou a mensagem.</p>';
        echo '<ul>';
        echo '<li>Confirma em <code>' . htmlspecialchars(envValue('TO_EMAIL', '')) . '</code> via <strong>webmail do cPanel</strong> (não Gmail, a menos que o MX aponte para o Google).</li>';
        echo '<li>Verifica a pasta de <strong>Spam/Lixo</strong>.</li>';
        echo '<li>Usa <strong>Track Delivery / Email Trace</strong> no cPanel/WHM para ver o percurso real da mensagem.</li>';
        echo '</ul>';
        echo '<p><strong>APP_ENV atual:</strong> ' . htmlspecialchars($appEnv) . ' | <strong>SMTP_HOST:</strong> ' . htmlspecialchars($smtpHost) . '</p>';
    }

} catch (\PHPMailer\PHPMailer\Exception $exception) {

    echo '</pre>';
    echo '<h2 style="color:red;">❌ Erro ao enviar: ' . $mail->ErrorInfo . '</h2>';

} catch (\Throwable $exception) {

    echo '</pre>';
    echo '<h2 style="color:red;">❌ Erro inesperado: ' . $exception->getMessage() . '</h2>';
}