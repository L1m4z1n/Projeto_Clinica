<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $assunto = $conn->real_escape_string($_POST['assunto']);
    $mensagem = $conn->real_escape_string($_POST['mensagem']);
    $usuario = $_SESSION['username'];

    // Insere a mensagem no banco de dados
    $sql = "INSERT INTO suporte (usuario, assunto, mensagem, data) VALUES ('$usuario', '$assunto', '$mensagem', NOW())";
    if ($conn->query($sql)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem: " . $conn->error;
    }
}
?>
