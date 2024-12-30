<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php'); // Caminho ajustado para o login
    exit();
}

// Dados simulados do histórico (substitua pelo banco de dados)
$historico = [
    "01/12/2024 - Login realizado",
    "02/12/2024 - Atualização do perfil",
    "03/12/2024 - Mensagem enviada ao suporte"
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css"> <!-- Caminho ajustado -->
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Meu Histórico</h2>
    <ul class="list-group mt-4">
        <?php foreach ($historico as $evento): ?>
            <li class="list-group-item"><?php echo htmlspecialchars($evento); ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<script src="../../js/bootstrap.bundle.min.js"></script> <!-- Caminho ajustado -->
</body>
</html>
