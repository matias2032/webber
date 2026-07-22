<?php
//galeria-servico.php
$current_page = 'gallery';
$base_path = $base_path ?? '';

require_once __DIR__ . '/includes/i18n.php';
require_once __DIR__ . '/includes/gallery_config.php';

$cat = isset($_GET['cat']) ? trim($_GET['cat']) : '';

$categories = $gallery_categories;

$valid = isset($categories[$cat]);
$cfg = $valid ? $categories[$cat] : null;
$images = $valid ? (isset($cfg['images']) ? $cfg['images'] : []) : [];

$title = $valid ? tc($cfg['title'] ?? t('gallery.category_default_title')) : '';
$icon = $valid ? ($cfg['icon'] ?? 'fa-folder-open') : '';
$description = $valid ? trim(tc($cfg['description'] ?? '')) : '';
?>
<!DOCTYPE html>
<html lang="<?= e($current_lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $valid ? e("Galeria: " . $title) : e(t('gallery.category_invalid_title')) ?> - STECH ENGENHARIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css?v=20250825-1015">
    <style>
        .page-header { background: linear-gradient(90deg, #2b6ef5, #e21b1b); color:#fff; }
        .gallery-img { aspect-ratio: 1/1; object-fit: cover; width: 100%; border-radius: .75rem; }
        .gallery-card { transition: transform .2s ease, box-shadow .2s ease; }
        .gallery-card:hover { transform: translateY(-3px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15) !important; }
        .album-title { scroll-margin-top: 90px; }
        .breadcrumb a { color: #fff; text-decoration: none; }
        .breadcrumb .active { color: #ffe; }
    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>

<main>
    <section class="py-5 page-header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                <div>

                    <h1 class="display-6 fw-bold mb-0">
                        <?php if ($valid): ?>
                            <i class="fa-solid <?= e($icon) ?> me-2"></i> <?= e($title) ?>
                        <?php else: ?>
                            <?= e(t('gallery.category_invalid_title')) ?>
                        <?php endif; ?>
                    </h1>
                    <?php if ($valid && $description !== ''): ?>
                        <p class="mt-2 lead mb-0"><?= nl2br(e($description)) ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <a href="<?= e($base_path) ?>galeria.php" class="btn btn-light"><i class="fa-solid fa-arrow-left me-2"></i><?= e(t('gallery.back_to_gallery')) ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <?php if (!$valid): ?>
                <div class="alert alert-danger"><?= e(t('gallery.category_invalid_desc')) ?> <a href="<?= e($base_path) ?>galeria.php"><?= e(t('gallery.title').'')?></a></div>
            <?php else: ?>
                <p class="text-muted mb-4"><?= count($images) ?> <?= e($images === 1 ? t('gallery.photo_singular') : t('gallery.photo_plural')) ?> <?= e(t('gallery.found_suffix')) ?></p>
                <?php if (empty($images)): ?>
                    <div class="alert alert-secondary"><?= e(t('gallery.images_empty_desc')) ?></div>
                <?php else: ?>
                    <div class="row g-4">
                        <?php foreach ($images as $img): ?>
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="card shadow-sm gallery-card h-100">
                                    <a href="<?= e($base_path) ?><?= e($img) ?>" target="_blank" rel="noopener">
                                        <img src="<?= e($base_path) ?><?= e($img) ?>" class="gallery-img" alt="<?= e($title) ?>">
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>