<?php $base_path = isset($base_path) ? $base_path : ''; ?>
<?php require_once __DIR__ . '/i18n.php'; ?>
<!--header.php -->
<!DOCTYPE html>
<html lang="<?= e($current_lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $base_path; ?>assets/images/Favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $base_path; ?>assets/images/Favicon.png">
    <link rel="shortcut icon" href="<?php echo $base_path; ?>assets/images/Favicon.png" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo $base_path; ?>assets/images/Favicon.png">
    <meta name="theme-color" content="#ffffff">
    <!-- <script src="<?php echo $base_path; ?>assets/js/protection.js"></script> -->
</head>
<body>
<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $base_path; ?>index.php">
                <img src="<?php echo $base_path; ?>assets/images/logo.png" alt="STECH ENGENHARIA" height="100" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'home' ? 'active' : ''; ?>" 
                        href="<?php echo $base_path; ?>index.php"><?= e(t('nav.home')) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'about' ? 'active' : ''; ?>" 
                        href="<?php echo $base_path; ?>sobre.php"><?= e(t('nav.about')) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'services' ? 'active' : ''; ?>" 
                        href="<?php echo $base_path; ?>servicos.php"><?= e(t('nav.services')) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'gallery' ? 'active' : ''; ?>" 
                        href="<?php echo $base_path; ?>galeria.php"><?= e(t('nav.gallery')) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page === 'contact' ? 'active' : ''; ?>" 
                        href="<?php echo $base_path; ?>contato.php"><?= e(t('nav.contact')) ?></a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        
                        <a class="btn btn-light btn-sm me-2" href="<?php echo $base_path; ?>contato.php#orcamento">
                            <i class="fa-regular fa-envelope me-1"></i> <?= e(t('nav.quote')) ?>
                        </a>
                        <a class="btn btn-success btn-sm social-wa me-2" href="https://wa.me/258842390756" target="_blank" rel="noopener">
                            <i class="fa-brands fa-whatsapp me-1"></i> <?= e(t('nav.whatsapp')) ?>
                        </a>
                        <!-- <a class="btn btn-danger-brand btn-sm d-none d-md-inline-flex" href="https://loja.stecheng.co.mz" target="_blank" rel="noopener">
                            <i class="fa-solid fa-store me-1"></i> <?= e(t('nav.store')) ?>
                        </a> -->

                        <li class="nav-item ms-lg-3 mt-3 mt-lg-0 d-flex align-items-center gap-2">
                        <div class="lang-switcher">
                            <a href="?lang=pt" class="<?= $current_lang === 'pt' ? 'active fw-bold' : '' ?>">PT</a>
                            /
                            <a href="?lang=en" class="<?= $current_lang === 'en' ? 'active fw-bold' : '' ?>">EN</a>
                        </div>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
