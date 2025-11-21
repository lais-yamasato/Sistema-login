<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Conexão com o mesmo banco
$db = new PDO('sqlite:lais.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificar se recebeu um ID
if (!isset($_GET['id'])) {
    die("ID inválido.");
}

$id = $_GET['id'];

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $stmt = $db->prepare("UPDATE usuarios 
                          SET nome = :nome, email = :email, telefone = :telefone, endereco = :endereco 
                          WHERE id = :id");

    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':telefone', $telefone);
    $stmt->bindValue(':endereco', $endereco);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: listar_usuarios.php");
    exit;
}

// Buscar dados do usuário
$stmt = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Usuário não encontrado.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <style>
        body {
            font-family: Arial;
            background: #eef2f3;
            padding: 20px;
        }
        .container {
            width: 400px;
            background: white;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #aaa;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #888;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 12px;
            background: #0077cc;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }
        button:hover {
            background: #005fa3;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0077cc;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Editar Usuário</h2>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>

        <label>Telefone:</label>
        <input type="text" name="telefone" value="<?php echo $usuario['telefone']; ?>">

        <label>Endereço:</label>
        <input type="text" name="endereco" value="<?php echo $usuario['endereco']; ?>">

        <button type="submit">Salvar Alterações</button>
    </form>

    <a href="listar_usuarios.php">← Voltar para a lista</a>
</div>

</body>
</html>
