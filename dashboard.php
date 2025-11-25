<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Painel</title>
<style>
    body {
        font-family: Arial;
        background: #f3f4f6;
        margin: 0;
        padding: 0;
        background: 
            linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),
            url('dog2.jpg') center/cover no-repeat;
    }
    .topo {
        background: linear-gradient(135deg, #2618ecff, #63b1f0ff);
        padding: 20px;
        color: white;
        text-align: center;
    }
    .conteudo {
        max-width: 700px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 5px 20px #0002;
        text-align: center;
        
    }
    .btn {
        display: block;
        padding: 15px;
        background: #2618ecff;
        color: white;
        text-decoration: none;
        margin: 10px 0;
        border-radius: 8px;
        font-size: 17px;
    }
    .btn:hover {
        background: #556cd6;
    }
</style>
</head>
<body>

<div class="topo">
    <h1>Olá, <?php echo htmlspecialchars($usuario['nome']); ?> 👋</h1>
</div>

<div class="conteudo">
    <h2>O que deseja fazer?</h2>

    <a class="btn" href="listar_usuarios.php">📄 Listar usuários</a>
    <a class="btn" href="formulario.php">✅ Cadastrar novo usuário</a>
    <a class="btn" href="logout.php" style="background:#e74c3c;">🚪 Sair</a>
</div>

</body>
</html>
