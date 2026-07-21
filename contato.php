<?php

$current_page = 'contact';

// ─────────────────────────────────────────────────────────────
// ESTADO INICIAL DO FORMULÁRIO
// ─────────────────────────────────────────────────────────────

$success_message = '';
$error_message = '';

$name = '';
$email = '';
$phone = '';
$company = '';
$selected_services = [];
$subject = '';
$message = '';
$consent = false;

// ─────────────────────────────────────────────────────────────
// PROCESSAMENTO DO FORMULÁRIO
// ─────────────────────────────────────────────────────────────

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $selected_services = array_filter(array_map('trim', $_POST['service_type'] ?? []));
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $consent = isset($_POST['consent']);

    $errors = [];

    if ($name === '') {
        $errors[] = 'Por favor, insira o seu nome.';
    }

    if (
        $email === ''
        || !filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $errors[] = 'Por favor, insira um e-mail válido.';
    }

    if ($phone === '') {
        $errors[] = 'Por favor, insira o seu telefone.';
    }

    if (empty($selected_services)) {
        $errors[] = 'Por favor, selecione pelo menos um tipo de serviço.';
    }

    if ($message === '') {
        $errors[] = 'Por favor, escreva a sua mensagem.';
    }

    if (!$consent) {
        $errors[] = 'É necessário aceitar os termos para continuar.';
    }

    if (empty($errors)) {

$services_final = implode(', ', $selected_services);

        $subject_final =
            ($subject !== ''
                ? $subject
                : 'Contacto através do website'
            )
            . ' - '
            . $services_final;

        $body_lines = [
            'Nova solicitação recebida através do website da STECH ENGENHARIA.',
            '',
            'Nome: ' . $name,
            'E-mail: ' . $email,
            'Telefone: ' . $phone,
            'Empresa: ' . ($company !== '' ? $company : 'Não informada'),
            'Serviços: ' . $services_final,
            'Assunto: ' . ($subject !== '' ? $subject : 'Não informado'),
            '',
            'Mensagem:',
            $message,
            '',
            'Consentimento para contacto: Sim',
        ];

        $plainBody = implode("\r\n", $body_lines);

        // ─────────────────────────────────────────────────
        // ENVIO POR SMTP (via includes/mailer.php + .env)
        // ─────────────────────────────────────────────────

        require_once __DIR__ . '/includes/mailer.php';

        $sent = false;
        $smtpError = '';

        try {

            $mail = getMailer();

            addRecipientsFromEnv($mail);

            $mail->addReplyTo($email, $name);

            $mail->Subject = $subject_final;
            $mail->Body = $plainBody;

            $mail->send();

            $sent = true;

        } catch (\PHPMailer\PHPMailer\Exception $exception) {

            $smtpError =
                'Falha no envio por SMTP: '
                . $exception->getMessage();

            error_log($smtpError);

        } catch (\Throwable $exception) {

            $smtpError =
                'Erro inesperado no envio: '
                . $exception->getMessage();

            error_log($smtpError);
        }

if ($sent) {

    // ─────────────────────────────────────────────────
    // ENVIO DE AUTO-RESPOSTA (via includes/mailer.php)
    // ─────────────────────────────────────────────────
    sendAutoReply($email, $name, $services_final);

    $success_message =
        'Mensagem enviada com sucesso! '
        . 'A nossa equipa entrará em contacto em breve.';

    $name = '';
    $email = '';
    $phone = '';
    $company = '';
    $selected_services = [];
    $subject = '';
    $message = '';
    $consent = false;

} else {

            $error_message =
                $smtpError !== ''
                    ? $smtpError
                    : 'Não foi possível enviar a mensagem neste momento. '
                        . 'Tente novamente mais tarde.';
        }

    } else {

        $error_message = implode('<br>', $errors);
    }
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Entre em contacto com a STECH ENGENHARIA e solicite um orçamento para serviços tecnológicos, redes, segurança, desenvolvimento e manutenção."
    >

    <title>Contacto - STECH ENGENHARIA</title>

    <link
        rel="icon"
        type="image/png"
        href="assets/images/Favicon.png"
    >

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
            'js-contact-animations'
        );
    </script>

    <link
        rel="stylesheet"
        href="assets/css/style.css?v=20260717-11"
    >

</head>

<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="contact-page">

    <!-- =====================================================
         HERO
         ===================================================== -->

    <section class="contact-hero">

        <div class="contact-hero-grid"></div>

        <div class="contact-hero-decoration contact-hero-decoration-one"></div>
        <div class="contact-hero-decoration contact-hero-decoration-two"></div>

        <div class="container position-relative">

            <div class="row align-items-center g-5">

                <div class="col-lg-8">

                    <div class="contact-hero-content">

                        <span class="contact-hero-kicker">

                            <i class="fa-solid fa-headset"></i>

                            Fale com a STECH

                        </span>

                        <h1 class="contact-hero-title">

                            Vamos transformar a sua necessidade

                            <span>
                                numa solução profissional.
                            </span>

                        </h1>

                        <p class="contact-hero-description">

                            Conte-nos sobre o seu projeto. A nossa equipa está
                            pronta para orientar, apresentar soluções e preparar
                            uma proposta adequada ao seu negócio.

                        </p>

                        <!-- <div class="contact-hero-actions">

                            <a
                                href="#orcamento"
                                class="btn btn-light"
                            >
                                Solicitar orçamento

                                <i class="fa-solid fa-arrow-down"></i>
                            </a>

                            <a
                                href="https://wa.me/258842390756?text=Ol%C3%A1%20STECH%20ENGENHARIA%2C%20gostaria%20de%20solicitar%20um%20or%C3%A7amento."
                                target="_blank"
                                rel="noopener"
                                class="btn contact-hero-whatsapp"
                            >
                                <i class="fa-brands fa-whatsapp"></i>

                                Falar no WhatsApp
                            </a>

                        </div> -->

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="contact-availability-card">

                        <span class="contact-availability-dot"></span>

                        <div>

                            <strong>
                                Equipa disponível
                            </strong>

                            <span>
                                Respondemos normalmente em poucas horas,
                                durante o horário comercial.
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         CONTACTOS E FORMULÁRIO
         ===================================================== -->

    <section class="contact-main-section">

        <div class="container">

            <div class="contact-section-heading contact-reveal">

                <div>

                    <span class="contact-section-kicker">
                        Estamos disponíveis
                    </span>

                    <h2>
                        Escolha como prefere falar connosco
                    </h2>

                </div>

                <p>
                    Utilize os nossos canais diretos ou preencha o formulário
                    para receber uma proposta personalizada.
                </p>

            </div>

            <div class="row g-4 align-items-start">

                <!-- =================================================
                     COLUNA DE CONTACTOS
                     ================================================= -->

                <div class="col-lg-4">

                    <div class="contact-aside-list">

                        <article
                            class="contact-aside-card contact-reveal"
                            style="--contact-delay: 60ms;"
                        >

                            <div class="aside-icon">

                                <i class="fa-solid fa-phone"></i>

                            </div>

                            <div class="contact-aside-content">

                                <span class="contact-aside-label">
                                    Atendimento direto
                                </span>

                                <h3>Telefone</h3>

                                <a
                                    href="tel:+258842390756"
                                    class="contact-aside-value"
                                >
                                    +258 84 239 0756
                                </a>

                                <p>
                                    Fale diretamente com a nossa equipa
                                    comercial e técnica.
                                </p>

                                <a
                                    href="tel:+258842390756"
                                    class="contact-aside-action"
                                >
                                    Ligar agora

                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                        <article
                            class="contact-aside-card contact-reveal"
                            style="--contact-delay: 140ms;"
                        >

                            <div class="aside-icon">

                                <i class="fa-regular fa-envelope"></i>

                            </div>

                            <div class="contact-aside-content">

                                <span class="contact-aside-label">
                                    Correio eletrónico
                                </span>

                                <h3>E-mail</h3>

                                <a
                                    href="mailto:info@stecheng.co.mz"
                                    class="contact-aside-value"
                                >
                                    info@stecheng.co.mz
                                </a>

                                <p>
                                    Envie documentos, requisitos ou detalhes
                                    sobre o seu projeto.
                                </p>

                                <a
                                    href="https://mail.google.com/mail/?view=cm&fs=1&to=info@stecheng.co.mz&su=Contacto%20atrav%C3%A9s%20do%20website"
                                    target="_blank"
                                    rel="noopener"
                                    class="contact-aside-action"
                                >
                                    Enviar e-mail

                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                        <article
                            class="contact-aside-card contact-reveal"
                            style="--contact-delay: 220ms;"
                        >

                            <div class="aside-icon">

                                <i class="fa-solid fa-location-dot"></i>

                            </div>

                            <div class="contact-aside-content">

                                <span class="contact-aside-label">
                                    Visite-nos
                                </span>

                                <h3>Endereço</h3>

                                <div class="contact-aside-value">
                                    Estrada Nacional Nr. 7
                                </div>

                                <p>
                                    Bairro Azul, Cidade de Tete,<br>
                                    Província de Tete, Moçambique.
                                </p>

                                <a
                                    href="#mapa"
                                    class="contact-aside-action"
                                >
                                    Ver localização

                                    <i class="fa-solid fa-arrow-down"></i>
                                </a>

                            </div>

                        </article>

                        <article
                            class="contact-aside-card contact-reveal"
                            style="--contact-delay: 300ms;"
                        >

                            <div class="aside-icon">

                                <i class="fa-regular fa-clock"></i>

                            </div>

                            <div class="contact-aside-content">

                                <span class="contact-aside-label">
                                    Horário
                                </span>

                                <h3>Atendimento</h3>

                                <div class="contact-aside-value">
                                    Segunda a sexta
                                </div>

                                <p>
                                    08h00 às 17h00<br>
                                    Sábado: 08h00 às 13h00<br>
                                    Domingo: fechado
                                </p>

                                <a
                                    href="#orcamento"
                                    class="contact-aside-action"
                                >
                                    Agendar visita

                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                        <article
                            class="contact-social-card contact-reveal"
                            style="--contact-delay: 380ms;"
                        >

                            <span class="contact-social-kicker">
                                Acompanhe a STECH
                            </span>

                            <h3>Redes sociais</h3>

                            <p>
                                Novidades, projetos, dicas e soluções
                                tecnológicas.
                            </p>

                            <div class="contact-social-links">

                                <a
                                    href="https://wa.me/258842390756"
                                    target="_blank"
                                    rel="noopener"
                                    class="contact-social-button social-wa"
                                    aria-label="WhatsApp"
                                >
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>

                                <a
                                    href="https://www.facebook.com/Stech.Engenharia/"
                                    target="_blank"
                                    rel="noopener"
                                    class="contact-social-button social-fb"
                                    aria-label="Facebook"
                                >
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>

                                <a
                                    href="#"
                                    class="contact-social-button social-ig"
                                    aria-label="Instagram"
                                >
                                    <i class="fa-brands fa-instagram"></i>
                                </a>

                                <a
                                    href="https://mz.linkedin.com/company/stech-engenharia"
                                    target="_blank"
                                    rel="noopener"
                                    class="contact-social-button social-li"
                                    aria-label="LinkedIn"
                                >
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>

                            </div>

                        </article>

                    </div>

                </div>

                <!-- =================================================
                     FORMULÁRIO
                     ================================================= -->

                <div class="col-lg-8">

                    <span
                        id="orcamento"
                        class="contact-anchor"
                    ></span>

                    <div class="contact-form-card contact-reveal">

                        <div class="contact-form-heading">

                            <span class="contact-form-icon">

                                <i class="fa-regular fa-paper-plane"></i>

                            </span>

                            <div>

                                <span class="contact-form-kicker">
                                    Conte-nos sobre o projeto
                                </span>

                                <h2>
                                    Solicite um orçamento
                                </h2>

                                <p>
                                    Preencha os dados abaixo e entraremos em
                                    contacto assim que possível.
                                </p>

                            </div>

                        </div>

                        <?php if ($success_message !== ''): ?>

                            <div
                                class="alert alert-success contact-alert"
                                id="successAlert"
                                role="alert"
                            >
                                <i class="fa-solid fa-circle-check"></i>

                                <span>
                                    <?= htmlspecialchars(
                                        $success_message,
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </span>
                            </div>

                        <?php endif; ?>

                        <?php if ($error_message !== ''): ?>

                            <div
                                class="alert alert-danger contact-alert"
                                role="alert"
                            >
                                <i class="fa-solid fa-circle-exclamation"></i>

                                <span>
                                    <?= $error_message ?>
                                </span>
                            </div>

                        <?php endif; ?>

                        <!-- Progresso -->

                        <div class="contact-form-progress">

                            <div class="contact-form-progress-header">

                                <span>
                                    Progresso do formulário
                                </span>

                                <strong id="formProgressValue">
                                    0%
                                </strong>

                            </div>

                            <div class="contact-form-progress-track">

                                <span id="formProgressBar"></span>

                            </div>

                        </div>

                        <form
                            action="contato.php#orcamento"
                            method="POST"
                            id="contactForm"
                            class="needs-validation"
                            novalidate
                        >

                            <div class="row g-4">

                                <div class="col-md-6">

                                    <label
                                        for="name"
                                        class="form-label"
                                    >
                                        Nome completo *
                                    </label>

                                    <div class="contact-input-group">

                                        <span class="contact-input-icon">
                                            <i class="fa-regular fa-user"></i>
                                        </span>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            required
                                            autocomplete="name"
                                            value="<?= htmlspecialchars(
                                                $name,
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>"
                                        >

                                    </div>

                                    <div class="invalid-feedback">
                                        Insira o seu nome.
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label
                                        for="email"
                                        class="form-label"
                                    >
                                        E-mail *
                                    </label>

                                    <div class="contact-input-group">

                                        <span class="contact-input-icon">
                                            <i class="fa-regular fa-envelope"></i>
                                        </span>

                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            name="email"
                                            required
                                            autocomplete="email"
                                            value="<?= htmlspecialchars(
                                                $email,
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>"
                                        >

                                    </div>

                                    <div class="invalid-feedback">
                                        Insira um e-mail válido.
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label
                                        for="phone"
                                        class="form-label"
                                    >
                                        Telefone *
                                    </label>

                                    <div class="contact-input-group">

                                        <span class="contact-input-icon">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>

                                        <input
                                            type="tel"
                                            class="form-control"
                                            id="phone"
                                            name="phone"
                                            required
                                            inputmode="tel"
                                            autocomplete="tel"
                                            placeholder="84 239 0756"
                                            value="<?= htmlspecialchars(
                                                $phone,
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>"
                                        >

                                    </div>

                                    <div class="invalid-feedback">
                                        Insira o seu telefone.
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label
                                        for="company"
                                        class="form-label"
                                    >
                                        Empresa
                                    </label>

                                    <div class="contact-input-group">

                                        <span class="contact-input-icon">
                                            <i class="fa-regular fa-building"></i>
                                        </span>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="company"
                                            name="company"
                                            autocomplete="organization"
                                            placeholder="Opcional"
                                            value="<?= htmlspecialchars(
                                                $company,
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>"
                                        >

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                                        <label class="form-label mb-0">
                                            Tipo de serviço * (pode escolher mais de um)
                                        </label>

                                        <button
                                            type="button"
                                            id="clearServicesButton"
                                            class="btn btn-link btn-sm p-0"
                                        >
                                            Limpar seleção
                                        </button>

                                    </div>

                                    <div
                                        class="contact-services-group"
                                        id="servicesGroup"
                                    >

                                        <?php

                                        $services = [
                                            'Segurança Tecnológica (CCTV, Alarmes)',
                                            'Desenvolvimento Web/Mobile',
                                            'Redes e Sistemas',
                                            'Manutenção de Equipamentos',
                                            'Design Gráfico',
                                            'Contrato de Manutenção',
                                            'Outro',
                                        ];

                                        foreach ($services as $index => $service):

                                            $checked = in_array($service, $selected_services, true);

                                        ?>

                                            <div class="form-check contact-service-check">

                                                <input
                                                    type="checkbox"
                                                    class="form-check-input service-checkbox"
                                                    id="service_<?= $index ?>"
                                                    name="service_type[]"
                                                    value="<?= htmlspecialchars($service, ENT_QUOTES, 'UTF-8') ?>"
                                                    <?= $checked ? 'checked' : '' ?>
                                                >

                                                <label
                                                    class="form-check-label"
                                                    for="service_<?= $index ?>"
                                                >
                                                    <?= htmlspecialchars($service, ENT_QUOTES, 'UTF-8') ?>
                                                </label>

                                            </div>

                                        <?php endforeach; ?>

                                    </div>

                                    <div class="invalid-feedback d-block" id="servicesError" style="display: none !important;">
                                        Selecione pelo menos um serviço.
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label
                                        for="subject"
                                        class="form-label"
                                    >
                                        Assunto
                                    </label>

                                    <div class="contact-input-group">

                                        <span class="contact-input-icon">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="subject"
                                            name="subject"
                                            placeholder="Resumo da solicitação"
                                            value="<?= htmlspecialchars(
                                                $subject,
                                                ENT_QUOTES,
                                                'UTF-8'
                                            ) ?>"
                                        >

                                    </div>

                                </div>

                                <!-- Orientação do serviço -->

                                <div class="col-12">

                                    <div
                                        class="contact-service-preview"
                                        id="servicePreview"
                                    >

                                        <span class="contact-service-preview-icon">

                                            <i class="fa-solid fa-circle-info"></i>

                                        </span>

                                        <span id="servicePreviewText">

                                            Selecione um serviço para receber
                                            uma breve orientação.

                                        </span>

                                    </div>

                                </div>

                                <div class="col-12">

                                    <label
                                        for="message"
                                        class="form-label"
                                    >
                                        Mensagem *
                                    </label>

                                    <textarea
                                        class="form-control contact-message"
                                        id="message"
                                        name="message"
                                        rows="6"
                                        required
                                        placeholder="Descreva as suas necessidades, objetivos ou dúvidas..."
                                    ><?= htmlspecialchars(
                                        $message,
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?></textarea>

                                    <div class="contact-message-footer">

                                        <span>
                                            Inclua o máximo de detalhes possível.
                                        </span>

                                        <span id="messageCounter">
                                            0 caracteres
                                        </span>

                                    </div>

                                    <div class="invalid-feedback">
                                        Escreva a sua mensagem.
                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="contact-consent">

                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="consent"
                                            name="consent"
                                            required
                                            <?= $consent ? 'checked' : '' ?>
                                        >

                                        <label
                                            class="form-check-label"
                                            for="consent"
                                        >
                                            Aceito receber contacto da STECH
                                            ENGENHARIA e concordo com os

                                            <a href="termos.php">
                                                Termos de Uso
                                            </a>.
                                        </label>

                                    </div>

                                    <div class="invalid-feedback">
                                        Aceite os termos para continuar.
                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="contact-form-actions">

                                        <button
                                            type="submit"
                                            class="btn btn-danger-brand contact-submit-button"
                                            id="contactSubmitButton"
                                        >

                                            <span class="contact-submit-label">

                                                <i class="fa-solid fa-paper-plane"></i>

                                                Enviar solicitação

                                            </span>

                                            <span class="contact-submit-loading">

                                                <span
                                                    class="spinner-border spinner-border-sm"
                                                    aria-hidden="true"
                                                ></span>

                                                A enviar...

                                            </span>

                                        </button>

                                        <a
                                            href="https://wa.me/258842390756?text=Ol%C3%A1%20STECH%20ENGENHARIA%2C%20gostaria%20de%20um%20or%C3%A7amento."
                                            target="_blank"
                                            rel="noopener"
                                            class="btn contact-form-whatsapp"
                                        >

                                            <i class="fa-brands fa-whatsapp"></i>

                                            WhatsApp

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         MAPA
         ===================================================== -->

    <section
        class="contact-map-section contact-reveal"
        id="mapa"
    >

        <div class="contact-map-overlay-card">

            <span class="contact-map-icon">

                <i class="fa-solid fa-location-dot"></i>

            </span>

            <div>

                <span class="contact-map-kicker">
                    Localização
                </span>

                <strong>
                    STECH ENGENHARIA
                </strong>

                <p>
                    Estrada Nacional Nr. 7,<br>
                    Bairro Azul, Cidade de Tete.
                </p>

                <a
                    href="https://www.google.com/maps/dir/?api=1&destination=-16.1406721,33.6246087"
                    target="_blank"
                    rel="noopener"
                >
                    Traçar rota

                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>

            </div>

        </div>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d180.5862448311117!2d33.62455607510125!3d-16.14080157774851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e0!4m0!4m3!3m2!1d-16.1406721!2d33.624608699999996!5e1!3m2!1spt-PT!2smz!4v1755679065464!5m2!1spt-PT!2smz"
            title="Localização da STECH ENGENHARIA"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
        ></iframe>

    </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"
></script>

<script src="assets/js/main.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ─────────────────────────────────────────────────────────
    // MÁSCARA DO TELEFONE
    // ─────────────────────────────────────────────────────────

    const phoneInput = document.getElementById('phone');

    if (
        phoneInput
        && typeof VMasker !== 'undefined'
    ) {
        VMasker(phoneInput).maskPattern('99 999 9999');
    }

    // ─────────────────────────────────────────────────────────
    // ANIMAÇÕES NO SCROLL
    // ─────────────────────────────────────────────────────────

    const revealItems = document.querySelectorAll(
        '.contact-reveal'
    );

    if (
        'IntersectionObserver' in window
        && !window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches
    ) {

const revealObserver = new IntersectionObserver(
    function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12, rootMargin: '0px 0px -6% 0px' }
);

        revealItems.forEach(function (item) {
            revealObserver.observe(item);
        });

    } else {

        revealItems.forEach(function (item) {
            item.classList.add('is-visible');
        });
    }

    // ─────────────────────────────────────────────────────────
    // ELEMENTOS DO FORMULÁRIO
    // ─────────────────────────────────────────────────────────

    const form = document.getElementById('contactForm');

    const submitButton =
        document.getElementById('contactSubmitButton');

    const progressBar =
        document.getElementById('formProgressBar');

    const progressValue =
        document.getElementById('formProgressValue');


    const servicePreview =
        document.getElementById('servicePreview');

    const servicePreviewText =
        document.getElementById('servicePreviewText');

    const messageInput =
        document.getElementById('message');

    const messageCounter =
        document.getElementById('messageCounter');

    // ─────────────────────────────────────────────────────────
    // PROGRESSO
    // ─────────────────────────────────────────────────────────

  const progressFields = [
        'name',
        'email',
        'phone',
        'message',
        'consent'
    ];

    function updateFormProgress() {

        let completed = 0;
        const totalFields = progressFields.length + 1; // +1 pelo grupo de serviços

        progressFields.forEach(function (fieldId) {

            const field = document.getElementById(fieldId);

            if (!field) {
                return;
            }

            const isCompleted =
                field.type === 'checkbox'
                    ? field.checked
                    : field.value.trim() !== '';

            if (isCompleted) {
                completed++;
            }
        });

        const anyServiceChecked =
            document.querySelectorAll('.service-checkbox:checked').length > 0;

        if (anyServiceChecked) {
            completed++;
        }

        const percentage = Math.round(
            completed / totalFields * 100
        );

        if (progressBar) {
            progressBar.style.width = percentage + '%';
        }

        if (progressValue) {
            progressValue.textContent = percentage + '%';
        }
    }

    progressFields.forEach(function (fieldId) {

        const field = document.getElementById(fieldId);

        if (!field) {
            return;
        }

        field.addEventListener('input', updateFormProgress);
        field.addEventListener('change', updateFormProgress);
    });

    document.querySelectorAll('.service-checkbox').forEach(function (checkbox) {
        checkbox.addEventListener('change', updateFormProgress);
    });

    updateFormProgress();

    // ─────────────────────────────────────────────────────────
    // ORIENTAÇÃO PELO SERVIÇO
    // ─────────────────────────────────────────────────────────

    const serviceDescriptions = {
        'Segurança Tecnológica (CCTV, Alarmes)':
            'Instalação, configuração e manutenção de sistemas de CCTV, alarmes e controlo de acesso.',

        'Desenvolvimento Web/Mobile':
            'Websites, sistemas web e aplicações adaptadas às necessidades do seu negócio.',

        'Redes e Sistemas':
            'Planeamento, instalação, configuração e suporte de redes e infraestrutura tecnológica.',

        'Manutenção de Equipamentos':
            'Diagnóstico, reparação e manutenção preventiva de equipamentos tecnológicos.',

        'Design Gráfico':
            'Identidade visual, materiais promocionais e comunicação gráfica profissional.',

        'Contrato de Manutenção':
            'Suporte técnico contínuo, manutenção programada e acompanhamento especializado.',

        'Outro':
            'Descreva a sua necessidade para prepararmos uma solução personalizada.'
    };

function updateServicePreview() {

        if (!servicePreview || !servicePreviewText) {
            return;
        }

        const checkedBoxes = Array.from(
            document.querySelectorAll('.service-checkbox:checked')
        );

        if (checkedBoxes.length === 0) {

            servicePreviewText.textContent =
                'Selecione um ou mais serviços para receber uma breve orientação.';

            servicePreview.classList.remove('is-active');

            return;
        }

        const descriptions = checkedBoxes
            .map(function (checkbox) {
                return serviceDescriptions[checkbox.value] || null;
            })
            .filter(Boolean);

        servicePreviewText.textContent = descriptions.join(' ');

        servicePreview.classList.add('is-active');
    }

    document.querySelectorAll('.service-checkbox').forEach(function (checkbox) {
        checkbox.addEventListener('change', updateServicePreview);
    });

    updateServicePreview();

    const clearServicesButton = document.getElementById('clearServicesButton');

    if (clearServicesButton) {

        clearServicesButton.addEventListener('click', function () {

            document.querySelectorAll('.service-checkbox').forEach(function (checkbox) {
                checkbox.checked = false;
            });

            updateServicePreview();
            updateFormProgress();
        });
    }
    // ─────────────────────────────────────────────────────────
    // CONTADOR DA MENSAGEM
    // ─────────────────────────────────────────────────────────

    function updateMessageCounter() {

        if (!messageInput || !messageCounter) {
            return;
        }

        const total = messageInput.value.length;

        messageCounter.textContent =
            total === 1
                ? '1 carácter'
                : total + ' caracteres';
    }

    if (messageInput) {
        messageInput.addEventListener(
            'input',
            updateMessageCounter
        );

        updateMessageCounter();
    }

    // ─────────────────────────────────────────────────────────
    // VALIDAÇÃO E ESTADO DE ENVIO
    // ─────────────────────────────────────────────────────────

    if (form) {

        form.addEventListener('submit', function (event) {

            if (!form.checkValidity()) {

                event.preventDefault();
                event.stopPropagation();

                form.classList.add('was-validated');

                const firstInvalid =
                    form.querySelector(':invalid');

                if (firstInvalid) {
                    firstInvalid.focus();
                }

                return;
            }

            form.classList.add('was-validated');

            if (submitButton) {

                submitButton.disabled = true;

                submitButton.classList.add(
                    'is-loading'
                );
            }
        });
    }

    // ─────────────────────────────────────────────────────────
    // ACESSO ATRAVÉS DE #ORCAMENTO
    // ─────────────────────────────────────────────────────────

    if (window.location.hash === '#orcamento') {

        const subjectInput =
            document.getElementById('subject');

        const nameInput =
            document.getElementById('name');

        if (
            subjectInput
            && subjectInput.value.trim() === ''
        ) {
            subjectInput.value =
                'Solicitação de Orçamento';
        }

        setTimeout(function () {
            nameInput?.focus();
        }, 450);
    }

    // ─────────────────────────────────────────────────────────
    // REMOVER ALERTA DE SUCESSO
    // ─────────────────────────────────────────────────────────

    const successAlert =
        document.getElementById('successAlert');

    if (successAlert) {

        setTimeout(function () {

            successAlert.classList.add(
                'contact-alert-hiding'
            );

            setTimeout(function () {
                successAlert.remove();
            }, 450);

        }, 6000);
    }
});
</script>

</body>
</html>