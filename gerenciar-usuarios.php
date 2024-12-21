<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $newRole = $_POST['role'];

    $sql = "UPDATE usuarios SET role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $newRole, $userId);
    $stmt->execute();

    echo "Permissão atualizada!";
}
?>
<form method="POST">
    <label>Usuário:</label>
    <select name="user_id">
        <?php
        $result = $conn->query("SELECT id, username FROM usuarios");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['username']}</option>";
        }
        ?>
    </select>

    <label>Permissão:</label>
    <select name="role">
        <option value="User">Usuário</option>
        <option value="Admin">Administrador</option>
    </select>

    <button type="submit">Atualizar</button>
</form>
