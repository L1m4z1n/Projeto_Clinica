<?php
include('../../config/config.php');
session_start();

// Verifica se o usuário está logado e se é administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $newRole = $_POST['role'];

    // Atualiza o papel do usuário no banco de dados
    $sql = "UPDATE usuarios SET role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $newRole, $userId);

    if ($stmt->execute()) {
        $message = "Permissão atualizada com sucesso!";
    } else {
        $error = "Erro ao atualizar permissão: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Permissões</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Gerenciar Permissões de Usuários</h2>

    <?php if (isset($message)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuário</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="" disabled selected>Selecione um usuário</option>
                <?php
                $result = $conn->query("SELECT id, username FROM usuarios");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['username']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Permissão</label>
            <select name="role" id="role" class="form-select" required>
                <option value="User">Usuário</option>
                <option value="Admin">Administrador</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Atualizar Permissão</button>
    </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
