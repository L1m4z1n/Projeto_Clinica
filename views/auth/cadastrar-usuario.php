<?php
// Inicia a sessão (se necessário para login futuro)
session_start();

// Inclui a configuração do banco de dados
include('../../config/config.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário e aplica segurança
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Gera o hash da senha
    $role = $conn->real_escape_string($_POST['role']); // Captura o papel do usuário

    // Insere o novo usuário no banco
    $sql = "INSERT INTO usuarios (username, password, role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        // Após cadastrar, redireciona para a página de login
        header('Location: login.php');
        exit; // Encerra o script após o redirecionamento
    } else {
        $error = "Erro ao cadastrar usuário: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Cadastro de Usuários</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="cadastrar-usuario.php">
    <div class="mb-3">
        <label for="username" class="form-label">Nome de Usuário</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Permissão</label>
        <select class="form-control" id="role" name="role" required>
            <option value="User">Usuário</option>
            <option value="Admin">Administrador</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
</form>
        </div>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
