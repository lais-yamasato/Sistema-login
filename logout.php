<?php
session_start();

// Encerrar sessão
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sessão encerrada</title>

    <style>
        body {
            font-family: Arial;
            background: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 350px;
            text-align: center;
            box-shadow: 0px 0px 10px #aaa;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        a button {
            background: #0077cc;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 15px;
            border-radius: 8px;
            cursor: pointer;
        }
        a button:hover {
            background: #005fa3;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Sessão encerrada</h2>
    <p>Você saiu do sistema com sucesso.</p>
    <a href="login.php"><button>Voltar ao Login</button></a>
</div>

</body>
</html>
