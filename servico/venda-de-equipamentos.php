<?php
$current_page = 'services';
$base_path = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Equipamentos - STECH ENGENHARIA</title>
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
            <h1 class="display-6 mb-2">Venda de Equipamentos</h1>
            <p class="lead text-muted mb-0">Informática, segurança e redes</p>
        </div>
    </section>
    <!-- Galeria do Serviço: 4 fotos + informações -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/pc.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 1" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Linha de Computadores</h5>
                            <p class="mb-0 text-muted">PCs e notebooks para escritório, gaming e estações profissionais.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/camd.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 2" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">CFTV e Acessórios</h5>
                            <p class="mb-0 text-muted">Câmeras, NVR/DVR, fontes e conectores certificados.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/reco.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 3" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Redes e Conectividade</h5>
                            <p class="mb-0 text-muted">Switches, roteadores, APs e cabeamento estruturado.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/nob.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 4" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Suprimentos</h5>
                            <p class="mb-0 text-muted">Periféricos, nobreaks, adaptadores e itens para reposição.</p>
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
                    <p>Trabalhamos com marcas reconhecidas e garantimos os melhores custos-benefícios para seu projeto de TI e segurança.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-check text-success me-2"></i>Computadores e periféricos</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Câmeras e gravadores</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Switches e roteadores</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Acessórios e suprimentos</li>
                    </ul>
                    <a href="../contato.php#orcamento" class="btn btn-primary mt-2">Solicitar Orçamento</a>
                </div>
                <div class="col-md-6">
                    <img src="../assets/images/prod.webp" class="img-fluid rounded shadow-sm" alt="Venda de Equipamentos">
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
