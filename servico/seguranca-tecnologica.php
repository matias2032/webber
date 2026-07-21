<?php
$current_page = 'services';
$base_path = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segurança Tecnológica - STECH ENGENHARIA</title>
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
            <h1 class="display-6 mb-2">Segurança Tecnológica</h1>
            <p class="lead text-muted mb-0">CCTV, alarmes, controle de acesso e monitoramento 24/7</p>
        </div>
    </section>
    <!-- Galeria do Serviço: 4 fotos + informações -->
    <section class="py-5 bg-light">
        <div class="container">

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/cam.jpeg" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 1" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Instalação de Câmeras</h5>
                            <p class="mb-0 text-muted">Implantação de CCTV com posicionamento estratégico e cabeamento seguro.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/bio.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 2" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Controle de Acesso</h5>
                            <p class="mb-0 text-muted">Biometria, cartões e relatórios de auditoria para entradas seguras.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/monicent.jpeg" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 3" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Monitoramento 24/7</h5>
                            <p class="mb-0 text-muted">Centro de monitoramento e alertas inteligentes por evento.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/cftv-em-nuvem.png" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 4" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Integração com App</h5>
                            <p class="mb-0 text-muted">Acesso remoto, gravação em nuvem e compartilhamento seguro.</p>
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
                    <p>Projetamos e instalamos soluções completas de segurança com equipamentos de alta performance e integração inteligente para residências, empresas e indústrias.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-check text-success me-2"></i>Câmeras IP/4K e DVR/NVR</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Alarmes inteligentes e sensores</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Controle de acesso biométrico e RFID</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Monitoramento remoto por app</li>
                    </ul>
                    <a href="../contato.php#orcamento" class="btn btn-primary mt-2">Solicitar Orçamento</a>
                </div>
                <div class="col-md-6">
                    <img src="../assets/images/proj.jpg" class="img-fluid rounded shadow-sm" alt="Segurança Tecnológica">
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
