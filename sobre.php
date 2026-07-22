<?php
$current_page = 'about';

require_once __DIR__ . '/includes/i18n.php';
?>
<!DOCTYPE html>
<html lang="<?= e($current_lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e(t('about.title')) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <!-- Page Header -->
<!-- =========================================================
     HERO SOBRE NÓS
     ========================================================= -->

<section class="about-hero">

    <div class="about-hero-grid"></div>

    <div
        class="about-hero-decoration
               about-hero-decoration-one"
    ></div>

    <div
        class="about-hero-decoration
               about-hero-decoration-two"
    ></div>

    <div class="container position-relative">

        <div class="row align-items-center g-5">

            <!-- Conteúdo principal -->
            <div class="col-lg-8">

                <div class="about-hero-content">

                    <span class="about-hero-kicker">

                        <i class="fa-solid fa-shield-halved"></i>

                        <?= e(t('about.hero_kicker')) ?>

                    </span>

                    <h1 class="about-hero-title">

                        <?= e(t('about.hero_title')) ?>

                        <span>
                            <?= e(t('about.hero_title_span')) ?>
                        </span>

                    </h1>

                    <p class="about-hero-description">

                        <?= e(t('about.hero_desc')) ?>

                    </p>

                    <div class="about-hero-actions">

                        <!-- 
                            href="#about"
                            class="btn btn-light"
                        >
                            Conhecer a STECH

                            <i class="fa-solid fa-arrow-down"></i>
                        </a> -->

                        
                          <a  href="assets/docs/APRESENTACAODASTECH-PT.pdf"
                            download
                            class="btn about-presentation-button"
                            aria-label="<?= e(t('about.hero_download_aria')) ?>"
                        >
                            <i class="fa-solid fa-file-arrow-down"></i>

                            <?= e(t('about.hero_btn_download')) ?>
                        </a>

                    </div>

                </div>

            </div>

            <!-- Cartão lateral -->
            <div class="col-lg-4">

                <div class="about-hero-highlight">

                    <span class="about-hero-highlight-icon">

                        <i class="fa-solid fa-microchip"></i>

                    </span>

                    <div>

                        <span class="about-hero-highlight-label">
                            <?= e(t('about.hero_highlight_label')) ?>
                        </span>

                        <strong>
                            <?= e(t('about.hero_highlight_title')) ?>
                        </strong>

                        <p>
                            <?= e(t('about.hero_highlight_desc')) ?>
                        </p>

                    </div>

                </div>

                <div class="about-hero-stats">

                    <div class="about-hero-stat">

                        <strong><?= e(t('about.stat_1_value')) ?></strong>

                        <span>
                            <?= e(t('about.stat_1_label')) ?>
                        </span>

                    </div>

                    <div class="about-hero-stat">

                        <strong><?= e(t('about.stat_2_value')) ?></strong>

                        <span>
                            <?= e(t('about.stat_2_label')) ?>
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
        <!-- About Content (layout conforme mockup) -->
        <section id="about" class="py-5 about-section">
            <div class="container">
                <div class="row g-4 align-items-start">
                    <!-- Coluna Esquerda: Texto e CTAs -->
                    <div class="col-lg-7">
                        <h2 class="display-5 fw-bold mb-4">
                            <span class="text-primary"><?= e(t('about.heading_1')) ?></span> <span class="text-danger"><?= e(t('about.heading_2')) ?></span>
                        </h2>
                        <p><?= e(t('about.p1')) ?></p>
                        <p><?= e(t('about.p2')) ?></p>
                        <p><?= e(t('about.p3')) ?></p>
                        <div class="d-flex gap-3 mt-4">
                            <a href="servicos.php" class="btn btn-danger"><?= e(t('about.btn_services')) ?></a>
                            <a href="contato.php" class="btn btn-outline-secondary"><span class="text-primary gradient-text"><?= e(t('about.btn_contact')) ?></a>
                        </div>
                    </div>

                    <!-- Coluna Direita: Cartões Missão e Visão -->
                    <div class="col-lg-5">
                        <div class="accent-card accent-red mb-4 shadow-sm bg-white rounded-3 p-4">
                            <h4 class="mb-2"><?= e(t('about.mission_title')) ?></h4>
                            <p class="mb-0"><?= e(t('about.mission_text')) ?></p>
                        </div>
                        <div class="accent-card accent-blue shadow-sm bg-white rounded-3 p-4">
                            <h4 class="mb-2"><?= e(t('about.vision_title')) ?></h4>
                            <p class="mb-0"><?= e(t('about.vision_text')) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nossos Valores -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row mb-4">
                    <div class="col-lg-8">
                        <h3 class="fw-bold"><?= e(t('about.values_title')) ?></h3>
                        <p class="mb-0"><?= e(t('about.values_desc')) ?></p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-red bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2"><?= e(t('about.value_1_title')) ?></h5>
                            <p class="mb-0"><?= e(t('about.value_1_desc')) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-blue bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2"><?= e(t('about.value_2_title')) ?></h5>
                            <p class="mb-0"><?= e(t('about.value_2_desc')) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-blue bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2"><?= e(t('about.value_3_title')) ?></h5>
                            <p class="mb-0"><?= e(t('about.value_3_desc')) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-red bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2"><?= e(t('about.value_4_title')) ?></h5>
                            <p class="mb-0"><?= e(t('about.value_4_desc')) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-red bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2"><?= e(t('about.value_5_title')) ?></h5>
                            <p class="mb-0"><?= e(t('about.value_5_desc')) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-blue bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2"><?= e(t('about.value_6_title')) ?></h5>
                            <p class="mb-0"><?= e(t('about.value_6_desc')) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-blue bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2"><?= e(t('about.value_7_title')) ?></h5>
                            <p class="mb-0"><?= e(t('about.value_7_desc')) ?></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-red bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2"><?= e(t('about.value_8_title')) ?></h5>
                            <p class="mb-0"><?= e(t('about.value_8_desc')) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Parceiros (logos) -->
        <section class="py-5 partners-section bg-white">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="badge bg-light text-primary border"><?= e(t('about.partners_badge')) ?></span>

                </div>
                <div class="row g-4 align-items-center justify-content-center partners-logos">
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/italians.png" alt="<?= e(t('about.partner_label')) ?> 1" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p5.jpg" alt="<?= e(t('about.partner_label')) ?> 2" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p1.jpg" alt="<?= e(t('about.partner_label')) ?> 3" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p2.jpg" alt="<?= e(t('about.partner_label')) ?> 4" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p4.jpg" alt="<?= e(t('about.partner_label')) ?> 5" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p6.jpg" alt="<?= e(t('about.partner_label')) ?> 6" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <!-- Extra partners added -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/over.jpg" alt="<?= e(t('about.partner_label')) ?> 7" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/kasp.png" alt="<?= e(t('about.partner_label')) ?> 8" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/hkv.png" alt="<?= e(t('about.partner_label')) ?> 9" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/tec.jpeg" alt="<?= e(t('about.partner_label')) ?> 10" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/quid.webp" alt="<?= e(t('about.partner_label')) ?> 11" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/TT.webp" alt="<?= e(t('about.partner_label')) ?> 12" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/ppp.png" alt="<?= e(t('about.partner_label')) ?> 13" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/acr.png" alt="<?= e(t('about.partner_label')) ?> 14" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/electro.jpeg" alt="<?= e(t('about.partner_label')) ?> 15" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/info.jpeg" alt="<?= e(t('about.partner_label')) ?> 16" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/esc.jpg" alt="<?= e(t('about.partner_label')) ?> 17" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/pro.jpeg" alt="<?= e(t('about.partner_label')) ?> 18" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/ss.jpg" alt="<?= e(t('about.partner_label')) ?> 18" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/icvl.jpg" alt="<?= e(t('about.partner_label')) ?> 18" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/MOZ CHEIM.png" alt="<?= e(t('about.partner_label')) ?> 19" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/Hotel Natura.png" alt="<?= e(t('about.partner_label')) ?> 20" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="display-6 mt-2 fw-bold"><span class="text-danger"><?= e(t('about.team_title')) ?></span></h2>
                    <p class="lead"><?= e(t('about.team_desc')) ?></p>
                </div>
                <div class="row">
                    <!-- Team Member 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/Mausse.jpg" alt="Antonio Mausse">
                            </div>
                            <h5 class="team-name mb-1">Antonio Mausse</h5>
                            <p class="team-role mb-0"><?= e(t('about.role_ceo')) ?></p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/cons.jpg" alt="Antonio Mausse">
                            </div>
                            <h5 class="team-name mb-1">Naira Mendonça</h5>
                            <p class="team-role mb-0"><?= e(t('about.role_admin')) ?></p>
                        </div>
                    </div>
                    <!-- Team Member 4 -->
                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m4.jpg" alt="Luis Manama">
                            </div>
                            <h5 class="team-name mb-1">Luis Manama</h5>
                            <p class="team-role mb-0"><?= e(t('about.role_eng')) ?></p>
                        </div>
                    </div>
                        <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m8.jpg" alt="Matias Matavel">
                            </div>
                            <h5 class="team-name mb-1">Matias Matavel</h5>
                            <p class="team-role mb-0"><?= e(t('about.role_eng')) ?></p>
                        </div>
                    </div>
                    <!-- Add more team members as needed -->
                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m6.jpg" alt="Alexandre Adamo">
                            </div>
                            <h5 class="team-name mb-1">Alexandre Adamo</h5>
                            <p class="team-role mb-0"><?= e(t('about.role_eng')) ?></p>
                            
                        </div>
                    </div>


                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m9.jpg" alt="Lurdes Muando">
                            </div>
                            <h5 class="team-name mb-1">Lurdes Muando</h5>
                            <p class="team-role mb-0"><?= e(t('about.role_accountant')) ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m5.jpg" alt="Laurete Valer">
                            </div>
                            <h5 class="team-name mb-1">Laurete Valer</h5>
                            <p class="team-role mb-0"><?= e(t('about.role_eng_f')) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>