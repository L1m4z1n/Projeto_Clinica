<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php'); // Caminho ajustado
    exit();
}

// Garante que apenas usuários comuns tenham acesso
if ($_SESSION['role'] !== 'User') {
    header('Location: ../auth/login.php'); // Caminho ajustado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Usuário</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css"> <!-- Caminho ajustado -->
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Bem-vindo à Área do Usuário</h2>
    <p class="text-center">Olá, <?php echo htmlspecialchars($_SESSION['username']); ?>! Aproveite as opções disponíveis.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ver Perfil</h5>
                    <p class="card-text">Veja e edite suas informações de perfil.</p>
                    <a href="perfil.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Histórico</h5>
                    <p class="card-text">Consulte seu histórico de atividades.</p>
                    <a href="historico.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Suporte</h5>
                    <p class="card-text">Entre em contato com nossa equipe de suporte.</p>
                    <a href="../suporte/suporte.php" class="btn btn-primary">Acessar</a> <!-- Caminho ajustado -->
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="../../public/logout.php" class="btn btn-danger">Sair</a> <!-- Caminho ajustado -->
    </div>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script> <!-- Caminho ajustado -->
</body>
</html>
