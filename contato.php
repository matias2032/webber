<?php
require_once __DIR__ . '/includes/i18n.php';
require_once __DIR__ . '/includes/mailer.php';
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

// Slugs estáveis dos serviços (independentes de idioma).
// O texto visível de cada um vem de t('contact.service_N').
$service_slugs = [
    'service_1',
    'service_2',
    'service_3',
    'service_4',
    'service_5',
    'service_6',
    'service_7',
];

// ─────────────────────────────────────────────────────────────
// PROCESSAMENTO DO FORMULÁRIO
// ─────────────────────────────────────────────────────────────

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $selected_services = array_filter(array_map('trim', $_POST['service_type'] ?? []));
    $selected_services = array_values(array_intersect($selected_services, $service_slugs));
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $consent = isset($_POST['consent']);

    $errors = [];

    if ($name === '') {
        $errors[] = t('contact.err_name_required');
    }

    if (
        $email === ''
        || !filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $errors[] = t('contact.err_email_required');
    }

    if ($phone === '') {
        $errors[] = t('contact.err_phone_required');
    }

    if (empty($selected_services)) {
        $errors[] = t('contact.err_services_required');
    }

    if ($message === '') {
        $errors[] = t('contact.err_message_required');
    }

    if (!$consent) {
        $errors[] = t('contact.err_consent_required');
    }

    if (empty($errors)) {

        // O e-mail para a empresa mantém-se SEMPRE em português,
        // independentemente do idioma selecionado no site.
        $pt_translations = loadTranslations('pt');

        $services_final = implode(', ', array_map(
            function ($slug) use ($pt_translations) {
                return $pt_translations['contact.' . $slug] ?? $slug;
            },
            $selected_services
        ));

        // Versão no idioma do utilizador, para o e-mail de auto-resposta.
        $services_final_client = implode(', ', array_map(
            function ($slug) {
                return t('contact.' . $slug);
            },
            $selected_services
        ));

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
     sendAutoReply($email, $name, $services_final_client, $current_lang);

    $success_message = t('contact.success');

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
                    : t('contact.error_generic');
        }

    } else {

        $error_message = implode('<br>', $errors);
    }
}

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
        content="<?= e(t('contact.meta_desc')) ?>"
    >

    <title><?= e(t('contact.title')) ?></title>

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

                            <?= e(t('contact.hero_kicker')) ?>

                        </span>

                        <h1 class="contact-hero-title">

                            <?= e(t('contact.hero_title')) ?>

                            <span>
                                <?= e(t('contact.hero_title_span')) ?>
                            </span>

                        </h1>

                        <p class="contact-hero-description">

                            <?= e(t('contact.hero_desc')) ?>

                        </p>

                        <!-- <div class="contact-hero-actions">

<a href="#orcamento" class="btn btn-light">
    Solicitar orçamento
    <i class="fa-solid fa-arrow-down"></i>
</a>


                            
<a href="https://wa.me/258842390756?text=Ol%C3%A1%20STECH%20ENGENHARIA%2C%20gostaria%20de%20solicitar%20um%20or%C3%A7amento." target="_blank" rel="noopener" class="btn contact-hero-whatsapp">
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
                                <?= e(t('contact.hero_available_title')) ?>
                            </strong>

                            <span>
                                <?= e(t('contact.hero_available_desc')) ?>
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
                        <?= e(t('contact.section_kicker')) ?>
                    </span>

                    <h2>
                        <?= e(t('contact.section_title')) ?>
                    </h2>

                </div>

                <p>
                    <?= e(t('contact.section_desc')) ?>
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
                                    <?= e(t('contact.card_phone_label')) ?>
                                </span>

                                <h3><?= e(t('contact.card_phone_title')) ?></h3>

<a href="tel:+258842390756" class="contact-aside-value">
    +258 84 239 0756
</a>

                                <p>
                                    <?= e(t('contact.card_phone_desc')) ?>
                                </p>

                                
<a href="tel:+258842390756" class="contact-aside-action">
    <?= e(t('contact.card_phone_action')) ?>
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
                                    <?= e(t('contact.card_email_label')) ?>
                                </span>

                                <h3><?= e(t('contact.card_email_title')) ?></h3>

<a href="mailto:info@stecheng.co.mz" class="contact-aside-value">
    info@stecheng.co.mz
</a>

                                <p>
                                    <?= e(t('contact.card_email_desc')) ?>
                                </p>

                                
<a href="https://mail.google.com/mail/?view=cm&fs=1&to=info@stecheng.co.mz&su=Contacto%20atrav%C3%A9s%20do%20website" target="_blank" rel="noopener" class="contact-aside-action">
    <?= e(t('contact.card_email_action')) ?>
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
                                    <?= e(t('contact.card_address_label')) ?>
                                </span>

                                <h3><?= e(t('contact.card_address_title')) ?></h3>

                                <div class="contact-aside-value">
                                    <?= e(t('contact.card_address_value')) ?>
                                </div>

                                <p>
                                    <?= t('contact.card_address_desc') ?>
                                </p>

                                
<a href="#mapa" class="contact-aside-action">
    <?= e(t('contact.card_address_action')) ?>
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
                                    <?= e(t('contact.card_hours_label')) ?>
                                </span>

                                <h3><?= e(t('contact.card_hours_title')) ?></h3>

                                <div class="contact-aside-value">
                                    <?= e(t('contact.card_hours_value')) ?>
                                </div>

                                <p>
                                    <?= t('contact.card_hours_desc') ?>
                                </p>

                                
<a href="#orcamento" class="contact-aside-action">
    <?= e(t('contact.card_hours_action')) ?>
    <i class="fa-solid fa-arrow-right"></i>
</a>

                            </div>

                        </article>

                        <article
                            class="contact-social-card contact-reveal"
                            style="--contact-delay: 380ms;"
                        >

                            <span class="contact-social-kicker">
                                <?= e(t('contact.social_kicker')) ?>
                            </span>

                            <h3><?= e(t('contact.social_title')) ?></h3>

                            <p>
                                <?= e(t('contact.social_desc')) ?>
                            </p>

                            <div class="contact-social-links">

<a href="https://wa.me/258842390756" target="_blank" rel="noopener" class="contact-social-button social-wa" aria-label="WhatsApp">
    <i class="fa-brands fa-whatsapp"></i>
</a>

<a href="https://www.facebook.com/Stech.Engenharia/" target="_blank" rel="noopener" class="contact-social-button social-fb" aria-label="Facebook">
    <i class="fa-brands fa-facebook-f"></i>
</a>

<a href="#" class="contact-social-button social-ig" aria-label="Instagram">
    <i class="fa-brands fa-instagram"></i>
</a>

<a href="https://mz.linkedin.com/company/stech-engenharia" target="_blank" rel="noopener" class="contact-social-button social-li" aria-label="LinkedIn">
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
                                    <?= e(t('contact.form_kicker')) ?>
                                </span>

                                <h2>
                                    <?= e(t('contact.form_title')) ?>
                                </h2>

                                <p>
                                    <?= e(t('contact.form_desc')) ?>
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
                                    <?= e($success_message) ?>
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

<!-- Modal de Alerta -->
<div
    class="modal fade"
    id="restrictedUseModal"
    tabindex="-1"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="fa-solid fa-circle-exclamation text-warning me-2"></i>
                    Aviso
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Fechar"
                ></button>

            </div>

            <div class="modal-body">

                Este formulário destina-se exclusivamente ao envio de
                solicitações comerciais, pedidos de orçamento e contratação
                de serviços da <strong>STECH ENGENHARIA</strong>.

                <br><br>

                Caso a sua mensagem esteja relacionada com vagas de emprego,
                estágios, recrutamento ou envio de currículo, solicitamos,
                por gentileza, que utilize os canais específicos para esse
                fim, quando disponibilizados.

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-danger"
                    data-bs-dismiss="modal"
                >
                    Compreendi
                </button>

            </div>

        </div>
    </div>
</div>

                        <!-- Progresso -->

                        <div class="contact-form-progress">

                            <div class="contact-form-progress-header">

                                <span>
                                    <?= e(t('contact.progress_label')) ?>
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
                                        <?= e(t('contact.label_name')) ?>
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
                                            value="<?= e($name) ?>"
                                        >

                                    </div>

                                    <div class="invalid-feedback">
                                        <?= e(t('contact.error_name')) ?>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label
                                        for="email"
                                        class="form-label"
                                    >
                                        <?= e(t('contact.label_email')) ?>
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
                                            value="<?= e($email) ?>"
                                        >

                                    </div>

                                    <div class="invalid-feedback">
                                        <?= e(t('contact.error_email')) ?>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label
                                        for="phone"
                                        class="form-label"
                                    >
                                        <?= e(t('contact.label_phone')) ?>
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
                                            value="<?= e($phone) ?>"
                                        >

                                    </div>

                                    <div class="invalid-feedback">
                                        <?= e(t('contact.error_phone')) ?>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label
                                        for="company"
                                        class="form-label"
                                    >
                                        <?= e(t('contact.label_company')) ?>
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
                                            placeholder="<?= e(t('contact.optional')) ?>"
                                            value="<?= e($company) ?>"
                                        >

                                    </div>

                                </div>

                                <div class="col-md-12">

                                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                                        <label class="form-label mb-0">
                                            <?= e(t('contact.label_services')) ?>
                                        </label>

                                        <button
                                            type="button"
                                            id="clearServicesButton"
                                            class="btn btn-link btn-sm p-0"
                                        >
                                            <?= e(t('contact.clear_selection')) ?>
                                        </button>

                                    </div>

                                    <div
                                        class="contact-services-group"
                                        id="servicesGroup"
                                    >

                                        <?php foreach ($service_slugs as $index => $slug):

                                            $checked = in_array($slug, $selected_services, true);

                                        ?>

                                            <div class="form-check contact-service-check">

                                                <input
                                                    type="checkbox"
                                                    class="form-check-input service-checkbox"
                                                    id="service_<?= $index ?>"
                                                    name="service_type[]"
                                                    value="<?= e($slug) ?>"
                                                    <?= $checked ? 'checked' : '' ?>
                                                >

                                                <label
                                                    class="form-check-label"
                                                    for="service_<?= $index ?>"
                                                >
                                                    <?= e(t('contact.' . $slug)) ?>
                                                </label>

                                            </div>

                                        <?php endforeach; ?>

                                    </div>

                                    <div class="invalid-feedback d-block" id="servicesError" style="display: none !important;">
                                        <?= e(t('contact.error_services')) ?>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label
                                        for="subject"
                                        class="form-label"
                                    >
                                        <?= e(t('contact.label_subject')) ?>
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
                                            placeholder="<?= e(t('contact.subject_placeholder')) ?>"
                                            value="<?= e($subject) ?>"
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

                                            <?= e(t('contact.service_preview_placeholder')) ?>

                                        </span>

                                    </div>

                                </div>

                                <div class="col-12">

                                    <label
                                        for="message"
                                        class="form-label"
                                    >
                                        <?= e(t('contact.label_message')) ?>
                                    </label>

                                    <textarea
                                        class="form-control contact-message"
                                        id="message"
                                        name="message"
                                        rows="6"
                                        required
                                        placeholder="<?= e(t('contact.message_placeholder')) ?>"
                                    ><?= e($message) ?></textarea>

                                    <div class="contact-message-footer">

                                        <span>
                                            <?= e(t('contact.message_hint')) ?>
                                        </span>

                                        <span id="messageCounter">
                                            0 <?= e(t('contact.chars')) ?>
                                        </span>

                                    </div>

                                    <div class="invalid-feedback">
                                        <?= e(t('contact.error_message')) ?>
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
                                            <?= e(t('contact.consent_text')) ?>

                                            <a href="termos.php">
                                                <?= e(t('contact.consent_terms')) ?>
                                            </a>.
                                        </label>

                                    </div>

                                    <div class="invalid-feedback">
                                        <?= e(t('contact.error_consent')) ?>
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

                                                <?= e(t('contact.submit_btn')) ?>

                                            </span>

                                            <span class="contact-submit-loading">

                                                <span
                                                    class="spinner-border spinner-border-sm"
                                                    aria-hidden="true"
                                                ></span>

                                                <?= e(t('contact.submit_loading')) ?>

                                            </span>

                                        </button>

                                        
<a href="https://wa.me/258842390756?text=Ol%C3%A1%20STECH%20ENGENHARIA%2C%20gostaria%20de%20um%20or%C3%A7amento." target="_blank" rel="noopener" class="btn contact-form-whatsapp">
    <i class="fa-brands fa-whatsapp"></i>
    <?= e(t('contact.whatsapp_btn')) ?>
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
                    <?= e(t('contact.map_kicker')) ?>
                </span>

                <strong>
                    STECH ENGENHARIA
                </strong>

                <p>
                    <?= t('contact.map_desc') ?>
                </p>

                
<a href="https://www.google.com/maps/dir/?api=1&destination=-16.1406721,33.6246087" target="_blank" rel="noopener">
    <?= e(t('contact.map_route')) ?>
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

<?php
// Textos usados pelo JavaScript inline abaixo, resolvidos no
// idioma atual através do sistema i18n.
$service_descriptions_js = [];

foreach ($service_slugs as $slug) {
    $num = str_replace('service_', '', $slug);
    $service_descriptions_js[$slug] = t('contact.service_desc_' . $num);
}

$contact_js_strings = [
    'servicePreviewDefault'  => t('contact.service_preview_default'),
    'messageCounterSingular' => t('contact.char'),
    'messageCounterPlural'   => t('contact.chars'),
];

$json_flags = JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP;
?>

<script>
const serviceDescriptions = <?= json_encode($service_descriptions_js, $json_flags) ?>;
const contactI18n = <?= json_encode($contact_js_strings, $json_flags) ?>;

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

function updateServicePreview() {

        if (!servicePreview || !servicePreviewText) {
            return;
        }

        const checkedBoxes = Array.from(
            document.querySelectorAll('.service-checkbox:checked')
        );

        if (checkedBoxes.length === 0) {

            servicePreviewText.textContent = contactI18n.servicePreviewDefault;

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
                ? '1 ' + contactI18n.messageCounterSingular
                : total + ' ' + contactI18n.messageCounterPlural;
    }

if (messageInput) {
        messageInput.addEventListener(
            'input',
            updateMessageCounter
        );

        updateMessageCounter();
    }

    // ─────────────────────────────────────────────────────────
    // DETEÇÃO DE PEDIDOS DE ESTÁGIO / EMPREGO
    // ─────────────────────────────────────────────────────────

const restrictedModalElement =
    document.getElementById('restrictedUseModal');

// O modal estava aninhado dentro de ".contact-form-card.contact-reveal",
// que usa "transform" na animação de entrada. Um ancestral com
// transform muda o "containing block" de elementos position:fixed,
// fazendo o modal posicionar-se relativamente a essa div em vez do
// ecrã — por isso o <nav> do cabeçalho ficava por cima e o popup
// não era clicável. Mover o modal para filho direto do <body>
// resolve isto na origem, sem depender de z-index.
if (restrictedModalElement.parentElement !== document.body) {
    document.body.appendChild(restrictedModalElement);
}

const restrictedUseModal = new bootstrap.Modal(
    restrictedModalElement
);

// Estado do modal controlado apenas pelos eventos oficiais
// do Bootstrap, nunca por leitura direta da classe "show"
// (essa leitura é instável durante a transição de fecho e
// causava múltiplos backdrops empilhados, bloqueando a página).
let isModalOpen = false;

restrictedModalElement.addEventListener('show.bs.modal', function () {
    isModalOpen = true;
});

restrictedModalElement.addEventListener('shown.bs.modal', function () {

    // Garante que o modal fica sempre acima de qualquer
    // backdrop, mesmo que algo tenha alterado a ordem no DOM
    // ou o z-index por CSS externo — é isto que resolve o
    // cursor não mudar para "pointer" sobre o popup.
    restrictedModalElement.style.zIndex = '1060';
});

restrictedModalElement.addEventListener('hidden.bs.modal', function () {

    isModalOpen = false;

    // Limpeza defensiva: remove qualquer backdrop e classe
    // "modal-open" que tenham ficado presos, e destrava o
    // scroll/cliques da página, independentemente da causa.
    document
        .querySelectorAll('.modal-backdrop')
        .forEach(function (backdrop) {
            backdrop.remove();
        });

    document.body.classList.remove('modal-open');
    document.body.style.removeProperty('overflow');
    document.body.style.removeProperty('padding-right');

    // Reavalia assim que o modal fecha: se a palavra proibida
    // ainda lá estiver, o popup pode voltar a abrir no próximo
    // "input" do utilizador.
});

const internshipKeywords = [

    'estagio',
    'estagios',
    'estagiario',
    'estagiaria',

    'vaga',
    'vagas',
    'vaga de emprego',
    'vagas de emprego',

    'emprego',
    'trabalho',
    'curriculo',
    'cv',

    'recrutamento',
    'recursos humanos',
    'rh',

    'contratacao',
    'contratação',

    'oportunidade de emprego',
    'candidatura',

    'trabalhar convosco',
    'trabalhar com voces',
    'trabalhar na empresa',

    'internship',
    'job',
    'career',
    'careers',
    'job vacancy',
    'vacancy'

];

    function normalizeText(text) {
        return (text || '')
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');
    }

    function containsInternshipKeyword(text) {
        const normalized = normalizeText(text);

        return internshipKeywords.some(function (keyword) {
            return normalized.includes(keyword);
        });
    }

function checkInternshipRequest() {

    const subjectValue = document.getElementById('subject')?.value || '';
    const messageValue = messageInput?.value || '';

    const currentState =
        containsInternshipKeyword(subjectValue) ||
        containsInternshipKeyword(messageValue);

    // Exibe o popup sempre que uma palavra proibida for
    // detetada, desde que o modal não esteja já aberto.
    if (currentState && !isModalOpen) {
        restrictedUseModal.show();
    }

    if (submitButton) {

        submitButton.disabled = currentState;

        submitButton.classList.toggle(
            'is-blocked',
            currentState
        );

    }

    return currentState;
}

    const subjectInputForCheck = document.getElementById('subject');

    if (subjectInputForCheck) {
        subjectInputForCheck.addEventListener('input', checkInternshipRequest);
    }

    if (messageInput) {
        messageInput.addEventListener('input', checkInternshipRequest);
    }

    checkInternshipRequest();

    // ─────────────────────────────────────────────────────────
    // VALIDAÇÃO E ESTADO DE ENVIO
    // ─────────────────────────────────────────────────────────

    if (form) {

        form.addEventListener('submit', function (event) {

            if (checkInternshipRequest()) {

                event.preventDefault();
                event.stopPropagation();

                internshipAlert?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                return;
            }

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

(function () {
    const modalEl = document.getElementById('restrictedUseModal');
    const btn = modalEl.querySelector('.modal-footer .btn-danger');
    const rect = btn.getBoundingClientRect();
    const x = rect.left + rect.width / 2;
    const y = rect.top + rect.height / 2;
    const topElement = document.elementFromPoint(x, y);

    console.log('Botão "Compreendi":', btn);
    console.log('Elemento realmente por cima do botão:', topElement);
    console.log('É o próprio botão?', topElement === btn);

    let ancestor = modalEl.parentElement;
    while (ancestor) {
        const style = getComputedStyle(ancestor);
        if (
            style.transform !== 'none' ||
            style.filter !== 'none' ||
            style.perspective !== 'none' ||
            style.willChange.includes('transform')
        ) {
            console.warn('Ancestral com transform/filter suspeito:', ancestor, {
                transform: style.transform,
                filter: style.filter,
                perspective: style.perspective,
                willChange: style.willChange
            });
        }
        ancestor = ancestor.parentElement;
    }
})();
</script>

</body>
</html>

