<?php
$current_page = 'about';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quem Somos - STECH ENGENHARIA</title>
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

                        Quem somos

                    </span>

                    <h1 class="about-hero-title">

                        Tecnologia, segurança e inovação

                        <span>
                            construídas para Moçambique.
                        </span>

                    </h1>

                    <p class="about-hero-description">

                        A STECH ENGENHARIA desenvolve soluções
                        tecnológicas que protegem operações,
                        fortalecem empresas e contribuem para a
                        transformação digital em Moçambique.

                    </p>

                    <div class="about-hero-actions">

                        <!-- <a
                            href="#about"
                            class="btn btn-light"
                        >
                            Conhecer a STECH

                            <i class="fa-solid fa-arrow-down"></i>
                        </a> -->

                        <a
                            href="assets/docs/APRESENTACAODASTECH-PT.pdf"
                            download
                            class="btn about-presentation-button"
                            aria-label="Baixar apresentação da STECH em PDF"
                        >
                            <i class="fa-solid fa-file-arrow-down"></i>

                            Baixar apresentação
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
                            O nosso propósito
                        </span>

                        <strong>
                            Tecnologia de confiança
                        </strong>

                        <p>
                            Soluções locais, profissionais e
                            preparadas para os desafios reais
                            das organizações moçambicanas.
                        </p>

                    </div>

                </div>

                <div class="about-hero-stats">

                    <div class="about-hero-stat">

                        <strong>100%</strong>

                        <span>
                            Compromisso com o cliente
                        </span>

                    </div>

                    <div class="about-hero-stat">

                        <strong>MZ</strong>

                        <span>
                            Conhecimento do mercado local
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
                            <span class="text-primary">Tecnologia de Confiança para</span> <span class="text-danger">Moçambique</span>
                        </h2>
                        <p>A STECH ENGENHARIA nasceu com o objetivo de proteger dados e operações com soluções de cibersegurança e tecnologia de qualidade em Moçambique, oferecendo serviços especializados em segurança tecnológica e desenvolvimento de sistemas.</p>
                        <p>Nossa equipe combina experiência técnica com conhecimento profundo do mercado local, garantindo soluções que verdadeiramente atendem às necessidades específicas de empresas moçambicanas.</p>
                        <p>Desde sistemas de segurança CCTV até desenvolvimento de aplicações web e mobile, nossa missão é fornecer tecnologia que impulsiona o crescimento dos nossos clientes.</p>
                        <div class="d-flex gap-3 mt-4">
                            <a href="servicos.php" class="btn btn-danger">Nossos Serviços</a>
                            <a href="contato.php" class="btn btn-outline-secondary"><span class="text-primary gradient-text">Fale Conosco</a>
                        </div>
                    </div>

                    <!-- Coluna Direita: Cartões Missão e Visão -->
                    <div class="col-lg-5">
                        <div class="accent-card accent-red mb-4 shadow-sm bg-white rounded-3 p-4">
                            <h4 class="mb-2">Nossa Missão</h4>
                            <p class="mb-0">Nossa missão é proteger nossos clientes contra ameaças online, mantendo seus dados e informações confidenciais seguros. Estamos comprometidos em criar um ambiente digital seguro para todos, oferecendo soluções inovadoras e eficazes para os desafios de segurança cibernética.</p>
                        </div>
                        <div class="accent-card accent-blue shadow-sm bg-white rounded-3 p-4">
                            <h4 class="mb-2">Nossa Visão</h4>
                            <p class="mb-0">Nossa visão é liderar a indústria em Moçambique e a nível da Africa Austral, sendo reconhecidos como a escolha número um para proteção cibernética, ajudando organizações e indivíduos a enfrentar os desafios do mundo digital.</p>
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
                        <h3 class="fw-bold">Nossos Valores</h3>
                        <p class="mb-0">Princípios que norteiam nossas ações e relacionamento com clientes e comunidades.</p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-red bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2">Integridade</h5>
                            <p class="mb-0">Atuamos com honestidade e ética em todas as relações.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-blue bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2">Inovação</h5>
                            <p class="mb-0">Buscamos soluções criativas e eficazes para novos desafios.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-blue bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2">Segurança</h5>
                            <p class="mb-0">Proteção de dados e continuidade como prioridades absolutas.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-red bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2">Confiança</h5>
                            <p class="mb-0">Relacionamentos transparentes e fiéis com clientes e parceiros.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-red bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2">Colaboração</h5>
                            <p class="mb-0">Trabalho em equipa para resultados superiores e sustentáveis.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-blue bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2">Educação</h5>
                            <p class="mb-0">Capacitação contínua de clientes e equipe contra ameaças.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-blue bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2">Responsabilidade</h5>
                            <p class="mb-0">Compromisso com a proteção de dados e conformidade.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="accent-card accent-red bg-white rounded-3 p-4 h-100">
                            <h5 class="mb-2">Respeito</h5>
                            <p class="mb-0">Valorizamos pessoas, culturas e privacidade em todas as ações.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Parceiros (logos) -->
        <section class="py-5 partners-section bg-white">
            <div class="container">
                <div class="text-center mb-4">
                    <span class="badge bg-light text-primary border">Nossos Parceiros e Clientes</span>

                </div>
                <div class="row g-4 align-items-center justify-content-center partners-logos">
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/italians.png" alt="Parceiro 1" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p5.jpg" alt="Parceiro 2" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p1.jpg" alt="Parceiro 3" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p2.jpg" alt="Parceiro 4" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p4.jpg" alt="Parceiro 5" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/p6.jpg" alt="Parceiro 6" class="img-fluid partner-logo">
                        </div>
                    </div>
                    <!-- Extra partners added -->
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/over.jpg" alt="Parceiro 7" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/kasp.png" alt="Parceiro 8" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/hkv.png" alt="Parceiro 9" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/tec.jpeg" alt="Parceiro 10" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/quid.webp" alt="Parceiro 11" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/TT.webp" alt="Parceiro 12" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/ppp.png" alt="Parceiro 13" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/acr.png" alt="Parceiro 14" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/electro.jpeg" alt="Parceiro 15" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/info.jpeg" alt="Parceiro 16" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/esc.jpg" alt="Parceiro 17" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/pro.jpeg" alt="Parceiro 18" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/ss.jpg" alt="Parceiro 18" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/icvl.jpg" alt="Parceiro 18" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/MOZ CHEIM.png" alt="Parceiro 19" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="partner-logo-wrap">
                            <img src="assets/images/partners/Hotel Natura.png" alt="Parceiro 20" class="img-fluid partner-logo partner-logo-large">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="display-6 mt-2 fw-bold"><span class="text-danger">Nossa Equipe</span></h2>
                    <p class="lead">Conheça os profissionais que fazem a diferença</p>
                </div>
                <div class="row">
                    <!-- Team Member 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/Mausse.jpg" alt="Antonio Mausse">
                            </div>
                            <h5 class="team-name mb-1">Antonio Mausse</h5>
                            <p class="team-role mb-0">Director Geral / <strong>CEO</strong></p>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/cons.jpg" alt="Antonio Mausse">
                            </div>
                            <h5 class="team-name mb-1">Naira Mendonça</h5>
                            <p class="team-role mb-0">Administradora</p>
                        </div>
                    </div>
                    <!-- Team Member 4 -->
                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m4.jpg" alt="Luis Manama">
                            </div>
                            <h5 class="team-name mb-1">Luis Manama</h5>
                            <p class="team-role mb-0">Eng. informático</p>
                        </div>
                    </div>
                        <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m8.jpg" alt="Matias Matavel">
                            </div>
                            <h5 class="team-name mb-1">Matias Matavel</h5>
                            <p class="team-role mb-0">Eng. informático</p>
                        </div>
                    </div>
                    <!-- Add more team members as needed -->
                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m6.jpg" alt="Alexandre Adamo">
                            </div>
                            <h5 class="team-name mb-1">Alexandre Adamo</h5>
                            <p class="team-role mb-0">Eng. informático</p>
                            
                        </div>
                    </div>


                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m9.jpg" alt="Lurdes Muando">
                            </div>
                            <h5 class="team-name mb-1">Lurdes Muando</h5>
                            <p class="team-role mb-0">Contabilista</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="team-card h-100 text-center p-4">
                            <div class="team-avatar mx-auto mb-3">
                                <img src="assets/images/equipe/m5.jpg" alt="Laurete Valer">
                            </div>
                            <h5 class="team-name mb-1">Laurete Valer</h5>
                            <p class="team-role mb-0">Eng. informática</p>
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
