<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Contato com o Suporte</h2>
    <form method="POST" action="enviar_suporte.php">
        <div class="mb-3">
            <label for="assunto" class="form-label">Assunto</label>
            <input type="text" class="form-control" id="assunto" name="assunto" required>
        </div>
        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
