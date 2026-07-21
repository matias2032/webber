<?php
// includes/config.php
// Configuração de produção — SMTP hardcoded (sem .env)

define('APP_ENV', 'production');

define('SMTP_HOST', 'mail.stecheng.co.mz');
define('SMTP_PORT', 465);
define('SMTP_AUTH', true);
define('SMTP_SECURE', 'ssl');

define('SMTP_USERNAME', 'matias@stecheng.co.mz');
define('SMTP_PASSWORD', 'Hexo.200632'); // <-- coloque a senha real aqui

define('FROM_EMAIL', 'matias@stecheng.co.mz');
define('FROM_NAME', 'STECH ENGENHARIA WebSite');

define('TO_EMAIL', 'info@stecheng.co.mz,compras@stecheng.co.mz');

define('MAIL_DEBUG', 0);
define('MAIL_TIMEOUT', 30);