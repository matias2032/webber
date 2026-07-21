<?php
$current_page = 'services';
$base_path = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas CCTV Avançados - STECH ENGENHARIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<main>
    <section class="page-header page-header-brand py-5">
        <div class="container">
            <a href="<?php echo $base_path; ?>servico.php" onclick="event.preventDefault(); if (history.length > 1) history.back(); else window.location.href='<?php echo $base_path; ?>servico.php';" class="btn btn-light btn-sm mb-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Voltar
            </a>
            <h1 class="display-6 mb-2">Sistemas CCTV Avançados</h1>
            <p class="lead text-muted mb-0">Videomonitoramento IP com análise e nuvem</p>
        </div>
    </section>
    <!-- Galeria do Serviço: 4 fotos + informações -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/cctv.jpg" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 1" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Câmeras 4K</h5>
                            <p class="mb-0 text-muted">Imagens nítidas com WDR, visão noturna e lentes varifocais.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/dvr.jpeg" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 2" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Gravação Inteligente</h5>
                            <p class="mb-0 text-muted">DVR/NVR com detecção por evento e armazenamento seguro.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/an.jpg" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 3" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Análise de Vídeo</h5>
                            <p class="mb-0 text-muted">Detecção de pessoas/objetos e alertas configuráveis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/mo.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 4" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Acesso Remoto</h5>
                            <p class="mb-0 text-muted">Visualização via app e web, com perfis e permissões.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <p>Deploy de câmeras IP 4K, armazenamento seguro e visualização em tempo real com alertas inteligentes por evento.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-check text-success me-2"></i>Alta resolução e visão noturna</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Detecção de movimento e pessoas</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Gravação local e em nuvem</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Aplicativo móvel e web</li>
                    </ul>
                    <a href="../contato.php#orcamento" class="btn btn-primary mt-2">Solicitar Orçamento</a>
                </div>
                <div class="col-md-6">
                    <img src="../assets/images/img.jpeg" class="img-fluid rounded shadow-sm" alt="Sistemas CCTV Avançados">
                </div>
            </div>
        </div>
    </section>
</main>
<?php include '../includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
