<?php

require_once __DIR__ . '/includes/i18n.php';

$current_page = 'home';
$base_path = '';

?>
<!DOCTYPE html>
<html lang="<?= e($current_lang) ?>">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="<?= e(t('home.meta_desc')) ?>"
    >

    <title>
        <?= e(t('home.title')) ?>
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    >

    <script>
        document.documentElement.classList.add(
            'js-home-reveal'
        );
    </script>

    <link
        rel="stylesheet"
        href="assets/css/style.css?v=20260717-22"
    >

    <link
        rel="icon"
        type="image/png"
        href="assets/images/Favicon.png"
    >

    <link
        rel="shortcut icon"
        href="assets/images/Favicon.png"
        type="image/png"
    >

    <link
        rel="apple-touch-icon"
        href="assets/images/Favicon.png"
    >

</head>

<body>

<?php include 'includes/header.php'; ?>

<main class="home-page">

    <!-- =====================================================
         HERO
         ===================================================== -->

    <section class="home-hero hero-slideshow">

        <div class="hero-slides">

            <div
                class="hero-slide"
                style="background-image:url('assets/images/WhatsAppImage2025-02-21at05.51.50_d129def5.jpg')"
            ></div>

            <div
                class="hero-slide"
                style="background-image:url('assets/images/cidade.jpg')"
            ></div>

            <div
                class="hero-slide"
                style="background-image:url('assets/images/noite.jpeg')"
            ></div>

            <div
                class="hero-slide"
                style="background-image:url('assets/images/eq.jpg')"
            ></div>

        </div>

        <div class="home-hero-grid"></div>

        <div
            class="home-hero-decoration
                   home-hero-decoration-one"
        ></div>

        <div
            class="home-hero-decoration
                   home-hero-decoration-two"
        ></div>

        <div class="container position-relative">

            <div class="row align-items-center g-5">

                <div class="col-lg-8">

                    <div class="home-hero-content">

                        <span class="home-hero-kicker">

                            <i class="fa-solid fa-shield-halved"></i>

                            <?= e(t('home.hero_kicker')) ?>

                        </span>

                        <h1 class="home-hero-title">

                            <span class="home-hero-brand">
                                <?= e(t('home.hero_brand')) ?>
                            </span>

                            <span class="home-hero-title-line">
                                <?= e(t('home.hero_title_line')) ?>
                            </span>

                        </h1>

                        <p class="home-hero-description">

                            <?= e(t('home.hero_desc')) ?>

                        </p>

                        <div class="home-hero-actions">

                            <a
                                href="servicos.php"
                                class="btn btn-light"
                            >
                                <?= e(t('home.hero_btn_services')) ?>

                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                            <a
                                href="contato.php#orcamento"
                                class="btn home-hero-quote-button"
                            >
                                <i class="fa-solid fa-paper-plane"></i>

                                <?= e(t('home.hero_btn_quote')) ?>
                            </a>

                        </div>

                        <div class="home-hero-trust">

                            <span>

                                <i class="fa-solid fa-circle-check"></i>

                                <?= e(t('home.hero_trust_1')) ?>

                            </span>

                            <span>

                                <i class="fa-solid fa-circle-check"></i>

                                <?= e(t('home.hero_trust_2')) ?>

                            </span>

                            <span>

                                <i class="fa-solid fa-circle-check"></i>

                                <?= e(t('home.hero_trust_3')) ?>

                            </span>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="home-hero-verified-card">

                        <span class="home-verified-badge">

                            <i class="fa-solid fa-check"></i>

                        </span>

                        <span class="home-hero-card-icon">
                            
                        <i class="fa-solid fa-gears"></i>
                        </span>

                        <div>

                            <span class="home-hero-card-label">
                                
                                
                                <?= e(t('home.hero_card_label')) ?>
                            </span>

                            <strong>
                                <?= e(t('home.hero_card_title')) ?>
                            </strong>

                            <p>
                                <?= e(t('home.hero_card_desc')) ?>
                            </p>

                        </div>

                    </div>

                    <div class="home-hero-mini-grid">

                        <div class="home-hero-mini-card">

                            <i class="fa-solid fa-shield"></i>

                            <div>

                                <strong>
                                    <?= e(t('home.mini_security_title')) ?>
                                </strong>

                                <span>
                                    <?= e(t('home.mini_security_desc')) ?>
                                </span>

                            </div>

                        </div>

                        <div class="home-hero-mini-card">

                            <i class="fa-solid fa-code"></i>

                            <div>

                                <strong>
                                    <?= e(t('home.mini_dev_title')) ?>
                                </strong>

                                <span>
                                    <?= e(t('home.mini_dev_desc')) ?>
                                </span>

                            </div>

                        </div>

                        <div class="home-hero-mini-card">

                            <i class="fa-solid fa-network-wired"></i>

                            <div>

                                <strong>
                                    <?= e(t('home.mini_infra_title')) ?>
                                </strong>

                                <span>
                                    <?= e(t('home.mini_infra_desc')) ?>
                                </span>

                            </div>

                        </div>

                        <div class="home-hero-mini-card">

                            <i class="fa-solid fa-headset"></i>

                            <div>

                                <strong>
                                    <?= e(t('home.mini_support_title')) ?>
                                </strong>

                                <span>
                                    <?= e(t('home.mini_support_desc')) ?>
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <a
            href="#home-introduction"
            class="home-hero-scroll"
            aria-label="Explorar página"
        >

            <span>
                <?= e(t('home.hero_scroll')) ?>
            </span>

            <i class="fa-solid fa-arrow-down"></i>

        </a>

    </section>

    <!-- =====================================================
         INTRODUÇÃO
         ===================================================== -->

<!-- =====================================================
     INTRODUÇÃO
     ===================================================== -->

<section
    class="home-introduction-section"
    id="home-introduction"
>

    <div class="container">

        <div class="home-introduction-panel home-reveal">

            <div class="row align-items-center g-5">

                <!-- Conteúdo principal -->
                <div class="col-lg-7">

                    <div class="home-introduction-content">

                        <span class="home-section-kicker">
                            <?= e(t('home.intro_kicker')) ?>
                        </span>

                        <h2 class="home-section-title">

                            <?= e(t('home.intro_title')) ?>

                            <span>
                                <?= e(t('home.intro_title_span')) ?>
                            </span>

                        </h2>

                        <p>

                            <?= e(t('home.intro_p1')) ?>

                        </p>

                        <p>

                            <?= e(t('home.intro_p2')) ?>

                        </p>

                        <div class="home-introduction-features">

                            <span>

                                <i class="fa-solid fa-check"></i>

                                <?= e(t('home.intro_feature_1')) ?>

                            </span>

                            <span>

                                <i class="fa-solid fa-check"></i>

                                <?= e(t('home.intro_feature_2')) ?>

                            </span>

                            <span>

                                <i class="fa-solid fa-check"></i>

                                <?= e(t('home.intro_feature_3')) ?>

                            </span>

                            <span>

                                <i class="fa-solid fa-check"></i>

                                <?= e(t('home.intro_feature_4')) ?>

                            </span>

                        </div>

                        <div class="home-introduction-actions">

                            <a
                                href="sobre.php"
                                class="btn btn-primary"
                            >
                                <?= e(t('home.intro_btn_know')) ?>

                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

<?php
$portfolio_file = ($current_lang === 'en')
    ? 'assets/docs/stecheng_ENG.pdf'
    : 'assets/docs/stecheng_PT.pdf';
?>

<a
    href="<?= e($portfolio_file) ?>"
    download
    class="home-text-link"
>

                                <i class="fa-solid fa-download"></i>

                                <?= e(t('home.intro_btn_download')) ?>

                            </a>

                        </div>

                    </div>

                </div>

                <!-- Painel institucional -->
                <div class="col-lg-5">

                    <div class="home-introduction-summary">

                        <span class="home-introduction-summary-icon">

                            <i class="fa-solid fa-microchip"></i>

                        </span>

                        <span class="home-introduction-summary-label">
                            <?= e(t('home.intro_summary_label')) ?>
                        </span>

                        <h3>
                            <?= e(t('home.intro_summary_title')) ?>
                        </h3>

                        <p>

                            <?= e(t('home.intro_summary_desc')) ?>

                        </p>

                        <div class="home-introduction-stats">

                            <div class="home-introduction-stat">

                                <strong>
                                    <?= e(t('home.stat_1_value')) ?>
                                </strong>

                                <span>
                                    <?= e(t('home.stat_1_label')) ?>
                                </span>

                            </div>

                            <div class="home-introduction-stat">

                                <strong>
                                    <?= e(t('home.stat_2_value')) ?>
                                </strong>

                                <span>
                                    <?= e(t('home.stat_2_label')) ?>
                                </span>

                            </div>

                            <div class="home-introduction-stat">

                                <strong>
                                    <?= e(t('home.stat_3_value')) ?>
                                </strong>

                                <span>
                                    <?= e(t('home.stat_3_label')) ?>
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

    <!-- =====================================================
         SERVIÇOS EM DESTAQUE
         ===================================================== -->

    <section class="home-services-section">

        <div class="container">

            <div class="home-section-heading home-reveal">

                <div>

                    <span class="home-section-kicker">
                        <?= e(t('home.services_kicker')) ?>
                    </span>

                    <h2 class="home-section-title">

                        <?= e(t('home.services_title')) ?>

                        <span>
                            <?= e(t('home.services_title_span')) ?>
                        </span>

                    </h2>

                </div>

                <p>

                    <?= e(t('home.services_desc')) ?>

                </p>

            </div>

            <div class="home-services-grid">

                <article
                    class="home-service-card home-reveal"
                    style="--home-delay: 40ms;"
                >

                    <span class="home-service-number">
                        01
                    </span>

                    <div class="home-service-icon">

                        <i class="fa-solid fa-shield"></i>

                    </div>

                    <h3>
                        <?= e(t('home.service_1_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.service_1_desc')) ?>
                    </p>

                    <ul>

                        <li>
                            <?= e(t('home.service_1_li1')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_1_li2')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_1_li3')) ?>
                        </li>

                    </ul>

                    <a href="servico/seguranca-tecnologica.php">

                        <?= e(t('home.service_explore')) ?>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

                <article
                    class="home-service-card home-reveal"
                    style="--home-delay: 100ms;"
                >

                    <span class="home-service-number">
                        02
                    </span>

                    <div class="home-service-icon">

                        <i class="fa-solid fa-code"></i>

                    </div>

                    <h3>
                        <?= e(t('home.service_2_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.service_2_desc')) ?>
                    </p>

                    <ul>

                        <li>
                            <?= e(t('home.service_2_li1')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_2_li2')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_2_li3')) ?>
                        </li>

                    </ul>

                    <a href="servico/desenvolvimento-web-mobile.php">

                        <?= e(t('home.service_explore')) ?>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

                <article
                    class="home-service-card home-reveal"
                    style="--home-delay: 160ms;"
                >

                    <span class="home-service-number">
                        03
                    </span>

                    <div class="home-service-icon">

                        <i class="fa-solid fa-network-wired"></i>

                    </div>

                    <h3>
                        <?= e(t('home.service_3_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.service_3_desc')) ?>
                    </p>

                    <ul>

                        <li>
                            <?= e(t('home.service_3_li1')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_3_li2')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_3_li3')) ?>
                        </li>

                    </ul>

                    <a href="servico/redes-e-sistemas.php">

                        <?= e(t('home.service_explore')) ?>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

                <article
                    class="home-service-card home-reveal"
                    style="--home-delay: 220ms;"
                >

                    <span class="home-service-number">
                        04
                    </span>

                    <div class="home-service-icon">

                        <i class="fa-solid fa-screwdriver-wrench"></i>

                    </div>

                    <h3>
                        <?= e(t('home.service_4_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.service_4_desc')) ?>
                    </p>

                    <ul>

                        <li>
                            <?= e(t('home.service_4_li1')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_4_li2')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_4_li3')) ?>
                        </li>

                    </ul>

                    <a href="servico/manutencao-de-equipamentos.php">

                        <?= e(t('home.service_explore')) ?>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

                <article
                    class="home-service-card home-reveal"
                    style="--home-delay: 280ms;"
                >

                    <span class="home-service-number">
                        05
                    </span>

                    <div class="home-service-icon">

                        <i class="fa-solid fa-pen-ruler"></i>

                    </div>

                    <h3>
                        <?= e(t('home.service_5_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.service_5_desc')) ?>
                    </p>

                    <ul>

                        <li>
                            <?= e(t('home.service_5_li1')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_5_li2')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_5_li3')) ?>
                        </li>

                    </ul>

                    <a href="servico/design-grafico.php">

                        <?= e(t('home.service_explore')) ?>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

                <article
                    class="home-service-card home-reveal"
                    style="--home-delay: 340ms;"
                >

                    <span class="home-service-number">
                        06
                    </span>

                    <div class="home-service-icon">

                        <i class="fa-solid fa-cart-shopping"></i>

                    </div>

                    <h3>
                        <?= e(t('home.service_6_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.service_6_desc')) ?>
                    </p>

                    <ul>

                        <li>
                            <?= e(t('home.service_6_li1')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_6_li2')) ?>
                        </li>

                        <li>
                            <?= e(t('home.service_6_li3')) ?>
                        </li>

                    </ul>

                    <a href="servico/venda-de-equipamentos.php">

                        <?= e(t('home.service_explore')) ?>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </article>

            </div>

            <div class="home-services-footer home-reveal">

                <a
                    href="servicos.php"
                    class="btn btn-outline-primary"
                >

                    <?= e(t('home.services_view_all')) ?>

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </section>

    <!-- =====================================================
         DIFERENCIAIS
         ===================================================== -->

    <section class="home-differentials-section">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-5">

                    <div class="home-differentials-content home-reveal">

                        <span class="home-section-kicker">
                            <?= e(t('home.diff_kicker')) ?>
                        </span>

                        <h2 class="home-section-title">

                            <?= e(t('home.diff_title')) ?>

                            <span>
                                <?= e(t('home.diff_title_span')) ?>
                            </span>

                        </h2>

                        <p>

                            <?= e(t('home.diff_desc')) ?>

                        </p>

                        <a
                            href="contato.php#orcamento"
                            class="btn btn-danger-brand"
                        >
                            <?= e(t('home.diff_btn')) ?>

                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

                <div class="col-lg-7">

                    <div class="home-differentials-grid">

                        <article
                            class="home-differential-card home-reveal"
                            style="--home-delay: 60ms;"
                        >

                            <span class="home-differential-icon">

                                <i class="fa-regular fa-star"></i>

                            </span>

                            <div>

                                <h3>
                                    <?= e(t('home.diff_1_title')) ?>
                                </h3>

                                <p>
                                    <?= e(t('home.diff_1_desc')) ?>
                                </p>

                            </div>

                        </article>

                        <article
                            class="home-differential-card home-reveal"
                            style="--home-delay: 120ms;"
                        >

                            <span class="home-differential-icon">

                                <i class="fa-solid fa-headset"></i>

                            </span>

                            <div>

                                <h3>
                                    <?= e(t('home.diff_2_title')) ?>
                                </h3>

                                <p>
                                    <?= e(t('home.diff_2_desc')) ?>
                                </p>

                            </div>

                        </article>

                        <article
                            class="home-differential-card home-reveal"
                            style="--home-delay: 180ms;"
                        >

                            <span class="home-differential-icon">

                                <i class="fa-solid fa-user-shield"></i>

                            </span>

                            <div>

                                <h3>
                                    <?= e(t('home.diff_3_title')) ?>
                                </h3>

                                <p>
                                    <?= e(t('home.diff_3_desc')) ?>
                                </p>

                            </div>

                        </article>

                        <article
                            class="home-differential-card home-reveal"
                            style="--home-delay: 240ms;"
                        >

                            <span class="home-differential-icon">

                                <i class="fa-solid fa-lightbulb"></i>

                            </span>

                            <div>

                                <h3>
                                    <?= e(t('home.diff_4_title')) ?>
                                </h3>

                                <p>
                                    <?= e(t('home.diff_4_desc')) ?>
                                </p>

                            </div>

                        </article>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         MÉTRICAS
         ===================================================== -->

    <section class="home-metrics-section">

        <div class="container">

            <div class="home-metrics-grid home-reveal">

                <article class="home-metric-item">

                    <span class="home-metric-icon">

                        <i class="fa-regular fa-clock"></i>

                    </span>

                    <strong class="home-metric-value">

                        <span class="prefix">+</span>

                        <span
                            class="count"
                            data-target="2"
                        >
                            0
                        </span>

                    </strong>

                    <span class="home-metric-label">
                        <?= e(t('home.metric_1_label')) ?>
                    </span>

                </article>

                <article class="home-metric-item">

                    <span class="home-metric-icon">

                        <i class="fa-regular fa-circle-check"></i>

                    </span>

                    <strong class="home-metric-value">

                        <span class="prefix">+</span>

                        <span
                            class="count"
                            data-target="100"
                        >
                            0
                        </span>

                    </strong>

                    <span class="home-metric-label">
                        <?= e(t('home.metric_2_label')) ?>
                    </span>

                </article>

                <article class="home-metric-item">

                    <span class="home-metric-icon">

                        <i class="fa-regular fa-star"></i>

                    </span>

                    <strong class="home-metric-value">

                        <span class="prefix">+</span>

                        <span
                            class="count"
                            data-target="50"
                        >
                            0
                        </span>

                    </strong>

                    <span class="home-metric-label">
                        <?= e(t('home.metric_3_label')) ?>
                    </span>

                </article>

                <article class="home-metric-item">

                    <span class="home-metric-icon">

                        <i class="fa-solid fa-headset"></i>

                    </span>

                    <strong class="home-metric-value">

                        <span
                            class="count"
                            data-target="24"
                        >
                            0
                        </span>

                        <span class="suffix">
                            /7
                        </span>

                    </strong>

                    <span class="home-metric-label">
                        <?= e(t('home.metric_4_label')) ?>
                    </span>

                </article>

            </div>

        </div>

    </section>

    <!-- =====================================================
         ESPECIALIZAÇÕES
         ===================================================== -->

    <section class="home-expertise-section">

        <div class="container">

            <div class="home-section-heading home-reveal">

                <div>

                    <span class="home-section-kicker">
                        <?= e(t('home.expertise_kicker')) ?>
                    </span>

                    <h2 class="home-section-title">

                        <?= e(t('home.expertise_title')) ?>

                        <span>
                            <?= e(t('home.expertise_title_span')) ?>
                        </span>

                    </h2>

                </div>

                <p>

                    <?= e(t('home.expertise_desc')) ?>

                </p>

            </div>

            <div class="home-expertise-grid">

                <article class="home-expertise-card home-reveal">

                    <i class="fa-solid fa-fire-flame-curved"></i>

                    <h3>
                        <?= e(t('home.exp_1_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.exp_1_desc')) ?>
                    </p>

                </article>

                <article class="home-expertise-card home-reveal">

<i class="fa-solid fa-shield"></i>

                    <h3>
                        <?= e(t('home.exp_2_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.exp_2_desc')) ?>
                    </p>

                </article>

                <article class="home-expertise-card home-reveal">

                    <i class="fa-solid fa-cloud-arrow-up"></i>

                    <h3>
                        <?= e(t('home.exp_3_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.exp_3_desc')) ?>
                    </p>

                </article>

                <article class="home-expertise-card home-reveal">

                    <i class="fa-solid fa-fingerprint"></i>

                    <h3>
                        <?= e(t('home.exp_4_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.exp_4_desc')) ?>
                    </p>

                </article>

                <article class="home-expertise-card home-reveal">

                    <i class="fa-solid fa-eye"></i>

                    <h3>
                        <?= e(t('home.exp_5_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.exp_5_desc')) ?>
                    </p>

                </article>

                <article class="home-expertise-card home-reveal">

                    <i class="fa-solid fa-user-graduate"></i>

                    <h3>
                        <?= e(t('home.exp_6_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.exp_6_desc')) ?>
                    </p>

                </article>

                <article class="home-expertise-card home-reveal">

                    <i class="fa-solid fa-shield" style="color:red"></i>

                    <h3>
                        <?= e(t('home.exp_7_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.exp_7_desc')) ?>
                    </p>

                </article>

                <article class="home-expertise-card home-reveal">

                    <i class="fa-solid fa-bug-slash"></i>

                    <h3>
                        <?= e(t('home.exp_8_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.exp_8_desc')) ?>
                    </p>

                </article>

            </div>

        </div>

    </section>

    <!-- =====================================================
         PROCESSO
         ===================================================== -->

    <section class="home-process-section">

        <div class="container">

            <div class="text-center home-process-heading home-reveal">

                <span class="home-section-kicker">
                    <?= e(t('home.process_kicker')) ?>
                </span>

                <h2 class="home-section-title">

                    <?= e(t('home.process_title')) ?>

                    <span>
                        <?= e(t('home.process_title_span')) ?>
                    </span>

                </h2>

                <p>
                    <?= e(t('home.process_desc')) ?>
                </p>

            </div>

            <div class="home-process-grid">

                <article
                    class="home-process-card home-reveal"
                    style="--home-delay: 40ms"
                >

                    <span class="home-process-number" style="color:#164b7f">
                        01
                    </span>

                    <div class="home-process-icon" style="background-color: #c9101a;">

                        <i class="fa-solid fa-magnifying-glass" ></i>

                    </div>

                    <h3>
                        <?= e(t('home.process_1_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.process_1_desc')) ?>
                    </p>

                </article>

                <article
                    class="home-process-card home-reveal"
                    style="--home-delay: 120ms;"
                >

                    <span class="home-process-number" style="color:#c9101a">
                        02
                    </span>

                    <div class="home-process-icon">

                        <i class="fa-solid fa-compass-drafting"></i>

                    </div>

                    <h3>
                        <?= e(t('home.process_2_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.process_2_desc')) ?>
                    </p>

                </article>

                <article
                    class="home-process-card home-reveal"
                    style="--home-delay: 200ms;"
                >

                    <span class="home-process-number" style="color:#164b7f">
                        03
                    </span>

                    <div class="home-process-icon" style="background-color: #c9101a;">

                        <i class="fa-solid fa-gears"></i>

                    </div>

                    <h3>
                        <?= e(t('home.process_3_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.process_3_desc')) ?>
                    </p>

                </article>

                <article
                    class="home-process-card home-reveal"
                    style="--home-delay: 280ms;"
                >

                    <span class="home-process-number" style="color:#c9101a">
                        04
                    </span>

                    <div class="home-process-icon">

                        <i class="fa-solid fa-headset"></i>

                    </div>

                    <h3>
                        <?= e(t('home.process_4_title')) ?>
                    </h3>

                    <p>
                        <?= e(t('home.process_4_desc')) ?>
                    </p>

                </article>

            </div>

        </div>

    </section>

    <!-- =====================================================
         PROJETOS
         ===================================================== -->

    <section class="home-projects-section">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <div class="home-projects-content home-reveal">

                        <span class="home-section-kicker">
                            <?= e(t('home.projects_kicker')) ?>
                        </span>

                        <h2 class="home-section-title">

                            <?= e(t('home.projects_title')) ?>

                            <span>
                                <?= e(t('home.projects_title_span')) ?>
                            </span>

                        </h2>

                        <p>

                            <?= e(t('home.projects_desc')) ?>

                        </p>

                        <div class="home-project-tags">

                            <span>
                                <?= e(t('home.projects_tag_1')) ?>
                            </span>

                            <span>
                                <?= e(t('home.projects_tag_2')) ?>
                            </span>

                            <span>
                                <?= e(t('home.projects_tag_3')) ?>
                            </span>

                            <span>
                                <?= e(t('home.projects_tag_4')) ?>
                            </span>

                            <span>
                                <?= e(t('home.projects_tag_5')) ?>
                            </span>

                        </div>

                        <a
                            href="galeria.php"
                            class="btn btn-primary"
                        >
                            <?= e(t('home.projects_btn')) ?>

                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="home-projects-gallery home-reveal">

                        <a
                            href="galeria.php"
                            class="home-project-image
                                   home-project-image-large"
                        >

                            <img
                                src="assets/images/WhatsAppImage2025-02-21at05.51.50_d129def5.jpg"
                                alt="Projeto realizado pela STECH"
                            >

                            <span>
                                <?= e(t('home.project_view')) ?>
                            </span>

                        </a>

                        <a
                            href="galeria.php"
                            class="home-project-image"
                        >

                            <img
                                src="assets/images/cidade.jpg"
                                alt="Projeto tecnológico da STECH"
                            >

                            <span>
                                <?= e(t('home.project_view')) ?>
                            </span>

                        </a>

                        <a
                            href="galeria.php"
                            class="home-project-image"
                        >

                            <img
                                src="assets/images/noite.jpeg"
                                alt="Projeto de segurança da STECH"
                            >

                            <span>
                                <?= e(t('home.project_view')) ?>
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         CTA FINAL
         ===================================================== -->

    <!-- <section class="home-final-cta-section">

        <div class="home-final-cta-grid"></div>

        <div class="container position-relative">

            <div class="home-final-cta-card home-reveal">

                <div>

                    <span class="home-final-cta-kicker">
                        Vamos trabalhar juntos
                    </span>

                    <h2>
                        Pronto para modernizar e proteger
                        o seu negócio?
                    </h2>

                    <p>
                        Fale com a nossa equipa e receba uma solução
                        adaptada às suas necessidades.
                    </p>

                </div>

                <div class="home-final-cta-actions">

                    <a
                        href="contato.php#orcamento"
                        class="btn btn-light"
                    >
                        Solicitar orçamento

                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                    <a
                        href="https://wa.me/258842390756?text=Ol%C3%A1%20STECH%20ENGENHARIA%2C%20gostaria%20de%20solicitar%20uma%20solu%C3%A7%C3%A3o."
                        target="_blank"
                        rel="noopener"
                        class="btn home-final-whatsapp"
                    >
                        <i class="fa-brands fa-whatsapp"></i>

                        WhatsApp
                    </a>

                </div>

            </div>

        </div>

    </section> -->

</main>

<?php include 'includes/footer.php'; ?>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
></script>

<script src="assets/js/main.js"></script>

<script src="assets/js/protection.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ANIMAÇÕES DAS SECÇÕES
       ===================================================== */

    const revealElements = document.querySelectorAll(
        '.home-reveal'
    );

    const reducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    if (
        'IntersectionObserver' in window
        && !reducedMotion
    ) {

        const revealObserver = new IntersectionObserver(
            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add(
                            'is-visible'
                        );

                    } else {

                        entry.target.classList.remove(
                            'is-visible'
                        );
                    }

                });

            },
            {
                threshold: 0.12,
                rootMargin: '0px 0px -6% 0px'
            }
        );

        revealElements.forEach(function (element) {

            revealObserver.observe(element);

        });

    } else {

        revealElements.forEach(function (element) {

            element.classList.add(
                'is-visible'
            );

        });
    }


    /* =====================================================
       CONTADORES
       ===================================================== */

    const counters = document.querySelectorAll(
        '.home-metric-value .count'
    );

    function animateCounter(counter) {

        if (
            counter.dataset.animated === 'true'
        ) {
            return;
        }

        counter.dataset.animated = 'true';

        const target = Number(
            counter.dataset.target
        );

        if (
            !Number.isFinite(target)
            || target < 0
        ) {

            counter.textContent = '0';

            return;
        }

        if (reducedMotion) {

            counter.textContent = String(target);

            return;
        }

        const duration = 1700;
        const startTime = performance.now();

        function updateCounter(currentTime) {

            const elapsed =
                currentTime - startTime;

            const progress =
                Math.min(
                    elapsed / duration,
                    1
                );

            /*
             * Easing suave:
             * começa rapidamente e desacelera no final.
             */
            const easedProgress =
                1 - Math.pow(
                    1 - progress,
                    3
                );

            const currentValue =
                Math.round(
                    target * easedProgress
                );

            counter.textContent =
                String(currentValue);

            if (progress < 1) {

                requestAnimationFrame(
                    updateCounter
                );

            } else {

                counter.textContent =
                    String(target);
            }
        }

        requestAnimationFrame(
            updateCounter
        );
    }

    if (
        'IntersectionObserver' in window
        && !reducedMotion
    ) {

        const counterObserver =
            new IntersectionObserver(
                function (entries, observer) {

                    entries.forEach(
                        function (entry) {

                            if (
                                !entry.isIntersecting
                            ) {
                                return;
                            }

                            animateCounter(
                                entry.target
                            );

                            observer.unobserve(
                                entry.target
                            );
                        }
                    );

                },
                {
                    threshold: 0.45
                }
            );

        counters.forEach(function (counter) {

            counterObserver.observe(
                counter
            );

        });

    } else {

        counters.forEach(function (counter) {

            animateCounter(counter);

        });
    }

});
</script>

</body>
</html>