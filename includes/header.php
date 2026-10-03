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
    <!-- Dark mode: síncrono e no head, para aplicar o tema antes de pintar a página -->
    <script src="<?php echo $base_path; ?>assets/js/darkmode.js"></script>
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
                    </li>

                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0 d-flex align-items-center gap-2">
                        <div class="lang-switcher" role="group" aria-label="Language">
                            <a href="?lang=pt"
                               class="lang-pill<?= $current_lang === 'pt' ? ' active' : '' ?>"
                               <?= $current_lang === 'pt' ? 'aria-current="true"' : '' ?>>
                                <span class="lang-flag">
                                    <svg viewBox="0 0 40 40" width="20" height="20" aria-hidden="true">
                                        <defs><clipPath id="clipFlagPT"><circle cx="20" cy="20" r="20"/></clipPath></defs>
                                        <g clip-path="url(#clipFlagPT)">
                                            <rect width="16" height="40" fill="#046A38"/>
                                            <rect x="16" width="24" height="40" fill="#DA291C"/>
                                            <circle cx="16" cy="20" r="6" fill="#FFCC00" stroke="#046A38" stroke-width="1"/>
                                        </g>
                                    </svg>
                                </span>
                                <span>PT</span>
                            </a>

                            <a href="?lang=en"
                               class="lang-pill<?= $current_lang === 'en' ? ' active' : '' ?>"
                               <?= $current_lang === 'en' ? 'aria-current="true"' : '' ?>>
                                <span class="lang-flag">
                                    <svg viewBox="0 0 40 40" width="20" height="20" aria-hidden="true">
                                        <defs><clipPath id="clipFlagEN"><circle cx="20" cy="20" r="20"/></clipPath></defs>
                                        <g clip-path="url(#clipFlagEN)">
                                            <rect width="40" height="40" fill="#00247D"/>
                                            <path d="M0 0 L40 40 M40 0 L0 40" stroke="#fff" stroke-width="6"/>
                                            <path d="M0 0 L40 40 M40 0 L0 40" stroke="#CF142B" stroke-width="2.5"/>
                                            <path d="M20 0 V40 M0 20 H40" stroke="#fff" stroke-width="11"/>
                                            <path d="M20 0 V40 M0 20 H40" stroke="#CF142B" stroke-width="6"/>
                                        </g>
                                    </svg>
                                </span>
                                <span>EN</span>
                            </a>
                        </div>

                        <button type="button" class="theme-toggle" id="themeToggle" data-theme-toggle
                                aria-pressed="false"
                                aria-label="<?= e(t('nav.dark_mode')) ?>"
                                data-label-to-dark="<?= e(t('nav.dark_mode')) ?>"
                                data-label-to-light="<?= e(t('nav.light_mode')) ?>">
                            <svg class="icon-sun" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="12" cy="12" r="4"/>
                                <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66 4.93 19.07M19.07 4.93l-1.41 1.41"/>
                            </svg>
                            <svg class="icon-moon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
