<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['bg_image'])) {
    $target_dir = __DIR__ . '/assets/images/';
    $target_file = $target_dir . 'hero-bg.jpg';
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['bg_image']['tmp_name']);
    if($check !== false) {
        $message = 'Arquivo é uma imagem - ' . $check['mime'] . '.';
        $uploadOk = 1;
    } else {
        $message = 'O arquivo não é uma imagem.';
        $uploadOk = 0;
    }
    
    // Check file size (max 5MB)
    if ($_FILES['bg_image']['size'] > 5000000) {
        $message = 'Desculpe, o arquivo é muito grande. Tamanho máximo: 5MB.';
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
        $message = 'Apenas arquivos JPG, JPEG e PNG são permitidos.';
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = 'Desculpe, seu arquivo não foi enviado. ' . $message;
    } else {
        // Create directory if it doesn't exist
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        // Try to upload file
        if (move_uploaded_file($_FILES['bg_image']['tmp_name'], $target_file)) {
            $message = 'A imagem de fundo foi enviada com sucesso!';
            $success = true;
        } else {
            $message = 'Ocorreu um erro ao enviar o arquivo.';
        }
    }
}
// Define a página atual para evitar notices no header
$current_page = '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Imagem de Fundo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            padding: 2rem;
            background-color: #f8f9fa;
        }
        .upload-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .preview {
            max-width: 100%;
            margin-top: 1rem;
            display: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container py-4">
        <div class="upload-container">
            <h2 class="mb-4">Enviar Imagem de Fundo</h2>
            
            <?php if (isset($message)): ?>
                <div class="alert alert-<?php echo isset($success) && $success ? 'success' : 'danger'; ?>" role="alert">
                    <?php echo $message; ?>
                </div>
                
                <?php if (isset($success) && $success): ?>
                    <div class="text-center mt-4">
                        <a href="index.php" class="btn btn-primary">Ver Site com a Nova Imagem</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
            <form action="" method="post" enctype="multipart/form-data" id="uploadForm">
                <div class="mb-3">
                    <label for="bg_image" class="form-label">Selecione a imagem de fundo</label>
                    <input class="form-control" type="file" id="bg_image" name="bg_image" accept="image/*" required>
                    <div class="form-text">Formatos aceitos: JPG, JPEG, PNG. Tamanho máximo: 5MB</div>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enviar Imagem</button>
                </div>
            </form>
            
            <div class="mt-4">
                <h5>Pré-visualização:</h5>
                <img id="preview" class="img-fluid preview" alt="Pré-visualização da imagem">
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>

    <script>
        // Show image preview
        document.getElementById('bg_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                const preview = document.getElementById('preview');
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
