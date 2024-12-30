<?php
session_start();
include_once __DIR__ . '/../../config/config.php'; // Caminho corrigido para incluir o config.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'Admin') {
                header('Location: ../../admin_dashboard.php'); // Painel do ADM
            } else {
                header('Location: ../../user_dashboard.php'); // Usuário comum
            }
            exit;
        } else {
            $error = "Credenciais inválidas!";
        }
    } else {
        $error = "Credenciais inválidas!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css"> <!-- Caminho corrigido -->
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Login</h2>
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
    <?php } ?>
    <form method="POST" action="login.php" class="mt-4">
        <div class="mb-3">
            <label for="username" class="form-label">Nome de Usuário</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
    <div class="text-center mt-3">
        <a href="cadastrar-usuario.php" class="btn btn-link">Não tem uma conta? Cadastre-se</a> <!-- Caminho corrigido -->
    </div>
</div>
<script src="../../js/bootstrap.bundle.min.js"></script> <!-- Caminho corrigido -->
</body>
</html>
