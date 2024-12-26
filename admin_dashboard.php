<?php
session_start();

// Verifica se o usuário está logado e se é administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: login.php'); // Redireciona para o login se não for Admin
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="gerenciar-usuarios.php">Gerenciar Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h1 class="display-4">Bem-vindo ao Painel do Administrador</h1>
            <p class="lead">Aqui você pode gerenciar usuários e acessar recursos administrativos.</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Gerenciar Usuários</h5>
                    <p class="card-text">Adicione, edite ou remova usuários do sistema.</p>
                    <a href="gerenciar-usuarios.php" class="btn btn-primary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Configurações do Sistema</h5>
                    <p class="card-text">Ajuste configurações globais e preferências.</p>
                    <a href="configuracoes.php" class="btn btn-secondary">Acessar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Relatórios</h5>
                    <p class="card-text">Visualize relatórios e estatísticas do sistema.</p>
                    <a href="relatorios.php" class="btn btn-info">Acessar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">&copy; <?php echo date("Y"); ?> Admin Dashboard. Todos os direitos reservados.</p>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
