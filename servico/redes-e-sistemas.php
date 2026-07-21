<?php
$current_page = 'services';
$base_path = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redes e Sistemas - STECH ENGENHARIA</title>
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
            <h1 class="display-6 mb-2">Redes e Sistemas</h1>
            <p class="lead text-muted mb-0">Infraestrutura, servidores e conectividade</p>
        </div>
    </section>
    <!-- Galeria do Serviço: 4 fotos + informações -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/cab.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 1" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Rack e Cabeamento</h5>
                            <p class="mb-0 text-muted">Organização de racks, patch panels e etiquetagem conforme normas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/wi.jpg" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 2" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Infraestrutura Wi‑Fi</h5>
                            <p class="mb-0 text-muted">APs de alto desempenho, survey e otimização de cobertura.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/serv.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 3" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Servidores e VM</h5>
                            <p class="mb-0 text-muted">Virtualização, backup e alta disponibilidade para serviços críticos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-md-flex align-items-center">
                        <img src="../assets/images/fv.webp" class="img-fluid rounded shadow-sm me-md-4 mb-3 mb-md-0" alt="Exemplo 4" style="max-width:260px;">
                        <div>
                            <h5 class="mb-1">Firewall e VPN</h5>
                            <p class="mb-0 text-muted">Políticas seguras, segmentação e acesso remoto corporativo.</p>
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
                    <p>Implementamos redes corporativas seguras e de alto desempenho, com monitoramento, backup e manutenção preventiva.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-check text-success me-2"></i>Redes cabeadas e Wi‑Fi</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Servidores e virtualização</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Backup e recuperação</li>
                        <li><i class="fa-solid fa-check text-success me-2"></i>Segurança e firewall</li>
                    </ul>
                    <a href="../contato.php#orcamento" class="btn btn-primary mt-2">Solicitar Orçamento</a>
                </div>
                <div class="col-md-6">
                    <img src="../assets/images/red.webp" class="img-fluid rounded shadow-sm" alt="Redes e Sistemas">
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
