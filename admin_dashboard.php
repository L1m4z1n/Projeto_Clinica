<?php
session_start();

// Verifica se o usuário está logado e se é administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header('Location: login.php'); // Redireciona para o login se não for Admin
    exit;
}
?>
<h1>Bem-vindo ao Painel do Administrador!</h1>

<?php if ($_SESSION['role'] === 'Admin') { ?>
    <a href="gerenciar-usuarios.php">Gerenciar Usuários</a>
<?php } else { ?>
    <p>Bem-vindo, <?php echo $_SESSION['username']; ?>! Aproveite nossos serviços.</p>
<?php } ?>
