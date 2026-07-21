<?php
$current_page = 'services';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossos Serviços - STECH ENGENHARIA</title>
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

                        Nossos serviços

                    </span>

                    <h1 class="services-main-hero-title">

                        Soluções completas para proteger,
                        modernizar e fazer crescer

                        <span>
                            o seu negócio.
                        </span>

                    </h1>

                    <p class="services-main-hero-description">

                        Da segurança tecnológica ao desenvolvimento de
                        sistemas, redes, manutenção e fornecimento de
                        equipamentos, entregamos soluções profissionais
                        adaptadas à realidade de empresas e residências
                        em Moçambique.

                    </p>

                    <div class="services-main-hero-actions">

                        <a
                            href="#lista-servicos"
                            class="btn btn-light"
                        >
                            Explorar serviços

                            <i class="fa-solid fa-arrow-down"></i>
                        </a>

                        <a
                            href="contato.php#orcamento"
                            class="btn services-main-hero-contact"
                        >
                            <i class="fa-solid fa-paper-plane"></i>

                            Solicitar orçamento
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
                            Soluções integradas
                        </span>

                        <strong>
                            Tecnologia com suporte local
                        </strong>

                        <p>
                            Planeamento, instalação, configuração,
                            manutenção e acompanhamento técnico
                            num único parceiro.
                        </p>

                    </div>

                </div>

                <div class="services-main-hero-stats">

                    <div class="services-main-hero-stat">

                        <strong>7+</strong>

                        <span>
                            Áreas de especialização
                        </span>

                    </div>

                    <div class="services-main-hero-stat">

                        <strong>360°</strong>

                        <span>
                            Atendimento do projeto ao suporte
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
                            <div class="service-badge bg-danger-subtle text-danger">Mais Popular</div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-shield"></i>
                            </div>
                            <h4 class="service-title">Segurança Tecnológica</h4>
                            <p class="service-desc">Sistemas CCTV, alarmes, controle de acesso e monitoramento 24/7 para proteção do seu património.</p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> CCTV HD/4K</li>
                                <li><i class="fa-solid fa-check text-success"></i> Alarmes inteligentes</li>
                                <li><i class="fa-solid fa-check text-success"></i> Controle biométrico</li>
                                <li><i class="fa-solid fa-check text-success"></i> Monitoramento remoto</li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>1000+</strong><span> Câmeras</span></div>
                                <div class="metric"><strong>100+</strong><span> Locais</span></div>
                            </div>
                            <a href="servico/seguranca-tecnologica.php" class="btn btn-light w-100">Saiba Mais <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Desenvolvimento Web/Mobile -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-primary-subtle text-primary">Inovação</div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <h4 class="service-title">Desenvolvimento Web/Mobile</h4>
                            <p class="service-desc">Sites modernos, aplicativos móveis e sistemas personalizados com tecnologia de ponta.</p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> Sites responsivos</li>
                                <li><i class="fa-solid fa-check text-success"></i> Apps iOS/Android</li>
                                <li><i class="fa-solid fa-check text-success"></i> E-commerce</li>
                                <li><i class="fa-solid fa-check text-success"></i> Integrações API</li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>150+</strong><span> Projetos</span></div>
                                <div class="metric"><strong>2+ anos</strong><span> Experiência</span></div>
                            </div>
                            <a href="servico/desenvolvimento-web-mobile.php" class="btn btn-light w-100">Saiba Mais <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Redes e Sistemas -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-success-subtle text-success">Essencial</div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-network-wired"></i>
                            </div>
                            <h4 class="service-title">Redes e Sistemas</h4>
                            <p class="service-desc">Instalação, configuração e manutenção de redes corporativas, servidores e infraestrutura de TI.</p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> Redes corporativas</li>
                                <li><i class="fa-solid fa-check text-success"></i> Servidores</li>
                                <li><i class="fa-solid fa-check text-success"></i> Wi‑Fi empresarial</li>
                                <li><i class="fa-solid fa-check text-success"></i> Backup em nuvem</li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>200+</strong><span> Projetos</span></div>
                                <div class="metric"><strong>2+ anos</strong><span> Experiência</span></div>
                            </div>
                            <a href="servico/redes-e-sistemas.php" class="btn btn-light w-100">Saiba Mais <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Manutenção de Equipamentos -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-warning-subtle text-warning">Suporte 24/7</div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-screwdriver-wrench"></i>
                            </div>
                            <h4 class="service-title">Manutenção de Equipamentos</h4>
                            <p class="service-desc">Manutenção preventiva e corretiva de computadores, impressoras e equipamentos tecnológicos.</p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> Manutenção preventiva</li>
                                <li><i class="fa-solid fa-check text-success"></i> Reparo de hardware</li>
                                <li><i class="fa-solid fa-check text-success"></i> Limpeza técnica</li>
                                <li><i class="fa-solid fa-check text-success"></i> Suporte on‑site</li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>200+</strong><span> Projetos</span></div>
                                <div class="metric"><strong>2+ anos</strong><span> Experiência</span></div>
                            </div>
                            <a href="servico/manutencao-de-equipamentos.php" class="btn btn-light w-100">Saiba Mais <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Design Gráfico -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-info-subtle text-info">Criativo</div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-pen-ruler"></i>
                            </div>
                            <h4 class="service-title">Design Gráfico</h4>
                            <p class="service-desc">Identidade visual, logos e materiais gráficos para marketing digital e impresso.</p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> Logotipos</li>
                                <li><i class="fa-solid fa-check text-success"></i> Identidade visual</li>
                                <li><i class="fa-solid fa-check text-success"></i> Material gráfico</li>
                                <li><i class="fa-solid fa-check text-success"></i> Design digital</li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>150+</strong><span> Projetos</span></div>
                                <div class="metric"><strong>2+ anos</strong><span> Experiência</span></div>
                            </div>
                            <a href="servico/design-grafico.php" class="btn btn-light w-100">Saiba Mais <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Venda de Equipamentos -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-success-subtle text-success">Qualidade</div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <h4 class="service-title">Venda de Equipamentos</h4>
                            <p class="service-desc">Comercialização de equipamentos de informática, segurança e acessórios tecnológicos.</p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> Computadores</li>
                                <li><i class="fa-solid fa-check text-success"></i> Câmeras de segurança</li>
                                <li><i class="fa-solid fa-check text-success"></i> Equipamentos de rede</li>
                                <li><i class="fa-solid fa-check text-success"></i> Acessórios</li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>500+</strong><span> Produtos</span></div>
                                <div class="metric"><strong>20+</strong><span> Marcas</span></div>
                            </div>
                            <a href="servico/venda-de-equipamentos.php" class="btn btn-light w-100">Saiba Mais <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>

                    <!-- Card: Sistemas CCTV Avançados -->
                    <div class="col-md-6 col-lg-4">
                        <div class="service-pro h-100">
                            <div class="service-badge bg-primary-subtle text-primary">Alta Tecnologia</div>
                            <div class="icon-wrap gradient">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                            <h4 class="service-title">Sistemas CCTV Avançados</h4>
                            <p class="service-desc">Soluções completas de videomonitoramento com tecnologia IP e armazenamento em nuvem.</p>
                            <ul class="service-list">
                                <li><i class="fa-solid fa-check text-success"></i> Câmeras IP 4K</li>
                                <li><i class="fa-solid fa-check text-success"></i> Análise inteligente</li>
                                <li><i class="fa-solid fa-check text-success"></i> Armazenamento nuvem</li>
                                <li><i class="fa-solid fa-check text-success"></i> App mobile</li>
                            </ul>
                            <div class="service-meta">
                                <div class="metric"><strong>1000+</strong><span> Câmeras</span></div>
                                <div class="metric"><strong>100+</strong><span> Locais</span></div>
                            </div>
                            <a href="servico/sistemas-cctv-avancados.php" class="btn btn-light w-100">Saiba Mais <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5 bg-light">
            <div class="container text-center">
                <h2>Precisa de uma solução personalizada?</h2>
                <p class="lead mb-4">Fale com nossa equipe</p>
                <a href="contato.php#orcamento" class="btn btn-primary btn-lg">Contactar</a>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
