<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Conexão correta com o mesmo banco
$db = new PDO('sqlite:lais.db');

// Verifica se recebeu um ID
if (!isset($_GET['id'])) {
    die("ID inválido.");
}

$id = $_GET['id'];

// Excluir o usuário
$stmt = $db->prepare("DELETE FROM usuarios WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Redireciona
header("Location: listar_usuarios.php");
exit;
?>

