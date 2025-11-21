<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<?php
// Conexão com SQLite
$db = new PDO('sqlite:lais.db');

// Buscar usuários
$query = $db->query("SELECT id, nome, email FROM usuarios");
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        th {
            background: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f1f1f1;
        }

        a.btn {
            padding: 6px 10px;
            background: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
        }

        a.btn-danger {
            background: #f44336;
        }

        .link-voltar {
            display: block;
            width: fit-content;
            margin: 20px auto;
            background: #555;
            color: #fff;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
        }

        .link-voltar:hover {
            background: #333;
        }
    </style>

</head>
<body>

<h2>Usuários cadastrados</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?php echo $u['id']; ?></td>
            <td><?php echo $u['nome']; ?></td>
            <td><?php echo $u['email']; ?></td>
            <td>
                <a class="btn" href="editar_usuario.php?id=<?php echo $u['id']; ?>">Editar</a>
                <a class="btn btn-danger" 
                   href="excluir_usuario.php?id=<?php echo $u['id']; ?>"
                   onclick="return confirm('Excluir usuário?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<a class="link-voltar" href="formulario.php">Cadastrar novo usuário</a>

</body>
</html>
