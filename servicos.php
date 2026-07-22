<?php
require_once __DIR__ . '/includes/i18n.php';

$current_page = 'services';
?>
<!DOCTYPE html>
<html lang="<?= e($current_lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e(t('services.title')) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <!-- Services Hero (mockup style) -->
 <!-- =========================================================
     HERO DE SERVIÇOS
     ========================================================= -->

<section class="services-main-hero">

    <div class="services-main-hero-grid"></div>

    <div
        class="services-main-hero-decoration
               services-main-hero-decoration-one"
    ></div>

    <div
        class="services-main-hero-decoration
               services-main-hero-decoration-two"
    ></div>

    <div class="container position-relative">

        <div class="row align-items-center g-5">

            <!-- Conteúdo principal -->
            <div class="col-lg-8">

                <div class="services-main-hero-content">

                    <span class="services-main-hero-kicker">

                        <i class="fa-solid fa-layer-group"></i>

                        <?= e(t('services.hero_kicker')) ?>

                    </span>

                    <h1 class="services-main-hero-title">

                        <?= e(t('services.hero_title')) ?>

                        <span>
                            <?= e(t('services.hero_title_span')) ?>
                        </span>

                    </h1>

                    <p class="services-main-hero-description">

                        <?= e(t('services.hero_desc')) ?>

                    </p>

                    <div class="services-main-hero-actions">

                        <a
                            href="#lista-servicos"
                            class="btn btn-light"
                        >
                            <?= e(t('services.btn_explore')) ?>

                            <i class="fa-solid fa-arrow-down"></i>
                        </a>

                        <a
                            href="contato.php#orcamento"
                            class="btn services-main-hero-contact"
                        >
                            <i class="fa-solid fa-paper-plane"></i>

                            <?= e(t('services.btn_quote')) ?>
                        </a>

                    </div>

                </div>

            </div>

            <!-- Destaque lateral -->
            <div class="col-lg-4">

                <div class="services-main-hero-highlight">

                    <span class="services-main-hero-highlight-icon">

                        <i class="fa-solid fa-gears"></i>

                    </span>

                    <div>

                        <span class="services-main-hero-highlight-label">
                            <?= e(t('services.highlight_label')) ?>
                        </span>

                        <strong>
                            <?= e(t('services.highlight_title')) ?>
                        </strong>

                        <p>
                            <?= e(t('services.highlight_desc')) ?>
                        </p>

                    </div>

                </div>

                <div class="services-main-hero-stats">

                    <div class="services-main-hero-stat">

                        <strong><?= e(t('services.stat_1_value')) ?></strong>

                        <span>
                            <?= e(t('services.stat_1_label')) ?>
                        </span>

                    </div>

                    <div class="services-main-hero-stat">

                        <strong><?= e(t('services.stat_2_value')) ?></strong>

                        <span>
                            <?= e(t('services.stat_2_label')) ?>
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

        <!-- Services Section (cards ricos) -->
        <section
    id="lista-servicos"
    class="services-list-section"
>
            <div class="container">
                <div class="row g-4">
                    <!-- Card: Segurança Tecnológica -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-danger-subtle text-danger"><?= e(t('services.badge_popular')) ?></div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-shield"></i>
                            </div>
                            <h4 class="service-title"><?= e(t('services.card1_title')) ?></h4>
                            <p class="service-desc"><?= e(t('services.card1_desc')) ?></p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card1_li1')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card1_li2')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card1_li3')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card1_li4')) ?></li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>1000+</strong><span> <?= e(t('services.card1_metric1')) ?></span></div>
                                <div class="metric"><strong>100+</strong><span> <?= e(t('services.card1_metric2')) ?></span></div>
                            </div>
                            <a href="servico/seguranca-tecnologica.php" class="btn btn-light w-100"><?= e(t('services.learn_more')) ?> <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Desenvolvimento Web/Mobile -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-primary-subtle text-primary"><?= e(t('services.badge_innovation')) ?></div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <h4 class="service-title"><?= e(t('services.card2_title')) ?></h4>
                            <p class="service-desc"><?= e(t('services.card2_desc')) ?></p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card2_li1')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card2_li2')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card2_li3')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card2_li4')) ?></li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>150+</strong><span> <?= e(t('services.card2_metric1')) ?></span></div>
                                <div class="metric"><strong>2+ anos</strong><span> <?= e(t('services.card2_metric2')) ?></span></div>
                            </div>
                            <a href="servico/desenvolvimento-web-mobile.php" class="btn btn-light w-100"><?= e(t('services.learn_more')) ?> <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Redes e Sistemas -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-success-subtle text-success"><?= e(t('services.badge_essential')) ?></div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-network-wired"></i>
                            </div>
                            <h4 class="service-title"><?= e(t('services.card3_title')) ?></h4>
                            <p class="service-desc"><?= e(t('services.card3_desc')) ?></p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card3_li1')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card3_li2')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card3_li3')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card3_li4')) ?></li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>200+</strong><span> <?= e(t('services.card2_metric1')) ?></span></div>
                                <div class="metric"><strong>2+ anos</strong><span> <?= e(t('services.card2_metric2')) ?></span></div>
                            </div>
                            <a href="servico/redes-e-sistemas.php" class="btn btn-light w-100"><?= e(t('services.learn_more')) ?> <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Manutenção de Equipamentos -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-warning-subtle text-warning"><?= e(t('services.badge_support')) ?></div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                            <h4 class="service-title"><?= e(t('services.card4_title')) ?></h4>
                            <p class="service-desc"><?= e(t('services.card4_desc')) ?></p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card4_li1')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card4_li2')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card4_li3')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card4_li4')) ?></li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>200+</strong><span> <?= e(t('services.card2_metric1')) ?></span></div>
                                <div class="metric"><strong>2+ anos</strong><span> <?= e(t('services.card2_metric2')) ?></span></div>
                            </div>
                            <a href="servico/manutencao-de-equipamentos.php" class="btn btn-light w-100"><?= e(t('services.learn_more')) ?> <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Design Gráfico -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-info-subtle text-info"><?= e(t('services.badge_creative')) ?></div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-pen-ruler"></i>
                            </div>
                            <h4 class="service-title"><?= e(t('services.card5_title')) ?></h4>
                            <p class="service-desc"><?= e(t('services.card5_desc')) ?></p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card5_li1')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card5_li2')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card5_li3')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card5_li4')) ?></li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>150+</strong><span> <?= e(t('services.card2_metric1')) ?></span></div>
                                <div class="metric"><strong>2+ anos</strong><span> <?= e(t('services.card2_metric2')) ?></span></div>
                            </div>
                            <a href="servico/design-grafico.php" class="btn btn-light w-100"><?= e(t('services.learn_more')) ?> <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Venda de Equipamentos -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-success-subtle text-success"><?= e(t('services.badge_quality')) ?></div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <h4 class="service-title"><?= e(t('services.card6_title')) ?></h4>
                            <p class="service-desc"><?= e(t('services.card6_desc')) ?></p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card6_li1')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card6_li2')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card6_li3')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card6_li4')) ?></li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>500+</strong><span> <?= e(t('services.card6_metric1')) ?></span></div>
                                <div class="metric"><strong>20+</strong><span> <?= e(t('services.card6_metric2')) ?></span></div>
                            </div>
                            <a href="servico/venda-de-equipamentos.php" class="btn btn-light w-100"><?= e(t('services.learn_more')) ?> <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Sistemas CCTV Avançados -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-primary-subtle text-primary"><?= e(t('services.badge_hightech')) ?></div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                            <h4 class="service-title"><?= e(t('services.card7_title')) ?></h4>
                            <p class="service-desc"><?= e(t('services.card7_desc')) ?></p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card7_li1')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card7_li2')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card7_li3')) ?></li>
                                <li><i class="fa-solid fa-check text-success"></i> <?= e(t('services.card7_li4')) ?></li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>1000+</strong><span> <?= e(t('services.card1_metric1')) ?></span></div>
                                <div class="metric"><strong>100+</strong><span> <?= e(t('services.card1_metric2')) ?></span></div>
                            </div>
                            <a href="servico/sistemas-cctv-avancados.php" class="btn btn-light w-100"><?= e(t('services.learn_more')) ?> <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5 bg-light">
            <div class="container text-center">
                <h2><?= e(t('services.cta_title')) ?></h2>
                <p class="lead mb-4"><?= e(t('services.cta_desc')) ?></p>
                <a href="contato.php#orcamento" class="btn btn-primary btn-lg"><?= e(t('services.cta_btn')) ?></a>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>