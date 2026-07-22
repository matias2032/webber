<?php

$current_page = 'gallery';
$base_path = $base_path ?? '';

require_once __DIR__ . '/includes/i18n.php';
require_once __DIR__ . '/includes/gallery_config.php';

$categories = $gallery_categories ?? [];

/**
 * Constrói caminhos internos do website.
 */
function assetPath(string $basePath, string $path): string
{
    return $basePath . ltrim($path, '/');
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
        content="<?= e(t('gallery.meta_desc')) ?>"
    >

    <title><?= e(t('gallery.title')) ?></title>

    <link
        rel="icon"
        type="image/png"
        href="<?= e(assetPath($base_path, 'assets/images/Favicon.png')) ?>"
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
    document.documentElement.classList.add('js-gallery-reveal');
</script>

    <link
        rel="stylesheet"
        href="<?= e(assetPath(
            $base_path,
            'assets/css/style.css?v=20260717-05'
        )) ?>"
    >
</head>

<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="gallery-page">

    <!-- =====================================================
         HERO
         ===================================================== -->

    <section class="gallery-hero">

        <div class="gallery-hero-decoration gallery-hero-decoration-one"></div>
        <div class="gallery-hero-decoration gallery-hero-decoration-two"></div>

        <div class="container position-relative">

            <div class="row align-items-center g-4">

                <div class="col-lg-8">

                    <div class="gallery-hero-content">

                        <span class="gallery-eyebrow">
                            <i class="fa-solid fa-images"></i>
                            <?= e(t('gallery.hero_eyebrow')) ?>
                        </span>

                        <h1 class="gallery-hero-title">
                            <?= e(t('gallery.hero_title_line1')) ?>
                            <span>
                                <?= e(t('gallery.hero_title_span')) ?>
                            </span>
                        </h1>

                        <p class="gallery-hero-description">
                            <?= e(t('gallery.hero_desc')) ?>
                        </p>
<div class="gallery-hero-actions">

    <a href="#gallery-projects" class="btn btn-light gallery-hero-button">
        <?= e(t('gallery.hero_btn_explore')) ?>
        <i class="fa-solid fa-arrow-down"></i>
    </a>

    <a href="<?= e(assetPath($base_path, 'contato.php#orcamento')) ?>" class="btn btn-outline-light gallery-hero-button">
        <?= e(t('gallery.hero_btn_quote')) ?>
        <i class="fa-regular fa-envelope"></i>
    </a>

</div>

                    </div>

                </div>

<div class="col-lg-4">

    <div class="contact-availability-card2">

        <span class="contact-verified-badge">

            <i class="fa-solid fa-check"></i>

        </span>

        <div>

            <strong>
                <?= e(t('gallery.hero_card_title')) ?>
            </strong>
<br>
            <span>
                <?= e(t('gallery.hero_card_desc')) ?>
            </span>

        </div>

    </div>

</div>

            </div>

        </div>

    </section>

    <!-- =====================================================
         PROJETOS
         ===================================================== -->

<section
    id="gallery-projects"
    class="gallery-projects-section"
>
    <div class="gallery-projects-container">
            <div class="gallery-section-heading">

                <div>
                    <span class="gallery-section-kicker">
                        <?= e(t('gallery.section_kicker')) ?>
                    </span>

                    <h2><?= e(t('gallery.section_title')) ?></h2>
                </div>

                <p>
                    <?= e(t('gallery.section_desc')) ?>
                </p>

            </div>

            <?php if (empty($categories)): ?>

                <div class="gallery-empty-state">

                    <div class="gallery-empty-icon">
                        <i class="fa-regular fa-images"></i>
                    </div>

                    <h3><?= e(t('gallery.empty_title')) ?></h3>

                    <p>
                        <?= e(t('gallery.empty_desc')) ?>
                    </p>

                </div>

            <?php else: ?>

                <div class="gallery-category-list">

                    <?php $categoryPosition = 0; ?>

                    <?php foreach ($categories as $slug => $category): ?>

                        <?php
                        $categoryPosition++;

                        $title = tc($category['title'] ?? t('gallery.category_default_title'));
                        $icon = $category['icon'] ?? 'fa-folder-open';

                        $description = trim(
                            tc($category['description'] ?? '')
                        );

                        $images = is_array($category['images'] ?? null)
                            ? $category['images']
                            : [];

                        $previewImages = array_slice($images, 0, 4);

                        $externalLink = trim(
                            $category['link'] ?? ''
                        );

                        $externalLabel = tc(
                            $category['link_label']
                            ?? t('gallery.category_default_link_label')
                        );

                        $totalImages = count($images);

                        $hasDescription = $description !== '';

                        $hasMoreImages =
                            $totalImages > count($previewImages);

                        $categoryDelay =
                            min($categoryPosition * 90, 630);
                        ?>

                    <?php
                    $isFirstCategory = $categoryPosition === 1;

                    $categoryClasses = $isFirstCategory
                        ? 'gallery-category-card gallery-category-first is-visible'
                        : 'gallery-category-card gallery-category-reveal';
                    ?>

                    <article
                        id="cat-<?= e((string) $slug) ?>"
                        class="<?= $categoryClasses ?>"
                    >

                            <!-- Cabeçalho da categoria -->

                            <header class="gallery-category-header">

                                <div class="gallery-category-identity">

                                    <span class="gallery-category-icon">
                                        <i class="fa-solid <?= e($icon) ?>"></i>
                                    </span>

                                    <div>
                                        <span class="gallery-category-label">
                                            <?= e(t('gallery.category_label')) ?>
                                        </span>

                                        <h2 class="gallery-category-title">
                                            <?= e($title) ?>
                                        </h2>
                                    </div>

                                </div>

                                <div class="gallery-category-actions">

                                    <span class="gallery-photo-count">
                                        <i class="fa-regular fa-image"></i>

                                        <?= $totalImages ?>

                                        <?= e($totalImages === 1
                                            ? t('gallery.photo_singular')
                                            : t('gallery.photo_plural')
                                        ) ?>
                                    </span>

<?php if ($externalLink !== ''): ?>

    <a href="<?= e($externalLink) ?>" target="_blank" rel="noopener" class="gallery-external-link">
        <?= e($externalLabel) ?>

        <i class="fa-solid fa-arrow-up-right-from-square"></i>
    </a>

<?php endif; ?>

                                </div>

                            </header>

                            <?php if (empty($images)): ?>

                                <div class="gallery-category-empty">

                                    <i class="fa-regular fa-images"></i>

                                    <div>
                                        <strong>
                                            <?= e(t('gallery.images_empty_title')) ?>
                                        </strong>

                                        <span>
                                            <?= e(t('gallery.images_empty_desc')) ?>
                                        </span>
                                    </div>

                                </div>

                            <?php else: ?>

                                <div class="row g-4 align-items-stretch">

                                    <!-- Fotografias -->

                                <div class="<?= $hasDescription
    ? 'col-xl-9 col-lg-8'
    : 'col-12'
?>">

<div class="gallery-images-grid">

                                            <?php foreach (
                                                $previewImages
                                                as $imageIndex => $image
                                            ): ?>

                                                <?php
                                                $imageUrl = assetPath(
                                                    $base_path,
                                                    (string) $image
                                                );

                                                $imageDelay =
                                                    ($imageIndex + 1) * 80;
                                                ?>

<div class="gallery-image-column">

    <a href="<?= e($imageUrl) ?>" target="_blank" rel="noopener" class="gallery-image-card" style="--gallery-image-delay: <?= $imageDelay ?>ms;" aria-label="<?= e(sprintf(t('gallery.image_aria_label'), $title)) ?>">

        <img
            src="<?= e($imageUrl) ?>"
            class="gallery-image"
            alt="<?= e(sprintf(t('gallery.image_alt'), $title)) ?>"
            loading="lazy"
        >

        <span class="gallery-image-overlay">
            <span class="gallery-image-open">
                <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
            </span>
            <span class="gallery-image-caption">
                <?= e(t('gallery.view_photo')) ?>
            </span>
        </span>

    </a>

</div>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                    <!-- Descrição -->

                                    <?php if ($hasDescription): ?>

<div class="col-xl-3 col-lg-4">

                                            <aside class="gallery-category-description">

                                                <span class="gallery-description-icon">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </span>

                                                <h3><?= e(t('gallery.about_work_title')) ?></h3>

                                                <div class="gallery-description-text">
                                                    <?= nl2br(e($description)) ?>
                                                </div>

                                            </aside>

                                        </div>

                                    <?php endif; ?>

                                </div>

                                <!-- Rodapé da categoria -->

                                <div class="gallery-category-footer">

                                    <span class="gallery-category-note">
                                        <i class="fa-solid fa-shield-halved"></i>

                                        <!-- Projeto realizado pela
                                        STECH ENGENHARIA -->
                                    </span>

<?php if ($hasMoreImages): ?>

    <?php
    $categoryUrl = assetPath(
        $base_path,
        'galeria-servico.php?cat='
        . urlencode((string) $slug)
    );
    ?>

    <a href="<?= e($categoryUrl) ?>" class="gallery-view-all">
        <span>
            <?= e(t('gallery.view_all_photos')) ?>
        </span>

        <strong>
            <?= $totalImages ?>
        </strong>

        <i class="fa-solid fa-arrow-right"></i>
    </a>

<?php endif; ?>

                                </div>

                            <?php endif; ?>

                        </article>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </div>

    </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
></script>

<script
    src="<?= e(assetPath($base_path, 'assets/js/main.js')) ?>"
></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const categories = Array.from(
        document.querySelectorAll('.gallery-category-reveal')
    );

    if (!categories.length) {
        return;
    }

    const revealAll = function () {
        categories.forEach(function (category) {
            category.classList.add('is-active');
        });
    };

    if (
        !('IntersectionObserver' in window)
        || window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches
    ) {
        revealAll();
        return;
    }

    const observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-active');
                } else {
                    entry.target.classList.remove('is-active');
                }
            });
        },
        {
            threshold: 0.18,
            rootMargin: '-12% 0px -18% 0px'
        }
    );

    categories.forEach(function (category) {
        observer.observe(category);
    });
});
</script>

</body>
</html>