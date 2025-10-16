<?php
// Inclui o arquivo de configuração
require_once 'config.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega todos os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];
    
    // Tenta cadastrar usando a função do config.php
    $sucesso = cadastrarUsuario($nome, $email, $senha, $telefone, $genero, $data_nascimento, $cidade, $estado, $endereco);
    
    if ($sucesso) {
        // Cadastro bem-sucedido!
        ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastro Realizado</title>
            <style>
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    color: white;
                    text-align: center;
                }
                .box {
                    background-color: rgba(0, 0, 0, 0.8);
                    padding: 50px;
                    border-radius: 15px;
                    border: 3px solid dodgerblue;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                }
                h1 { 
                    margin-bottom: 20px; 
                    font-size: 32px; 
                    color: dodgerblue;
                }
                p { 
                    font-size: 18px; 
                    margin: 10px 0; 
                }
                a {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 12px 30px;
                    background-image: linear-gradient(to right, rgb(20,147,220), rgb(31, 155, 212));
                    color: white;
                    text-decoration: none;
                    border-radius: 10px;
                    font-weight: bold;
                }
                a:hover { 
                    background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));
                }
            </style>
        </head>
        <body>
            <div class="box">
                <h1>✅ Cadastro realizado com sucesso!</h1>
                <p>Bem-vindo(a), <strong><?php echo htmlspecialchars($nome); ?></strong>!</p>
                <p>E-mail: <?php echo htmlspecialchars($email); ?></p>
                <p>Cidade: <?php echo htmlspecialchars($cidade); ?> - <?php echo htmlspecialchars($estado); ?></p>
                <p>Agora você já pode fazer login!</p>
                <a href="login.html">Fazer login agora</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Cadastro falhou (provavelmente e-mail duplicado)
        ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Erro no Cadastro</title>
            <style>
                body {
                    font-family: Arial, Helvetica, sans-serif;
                    background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    color: white;
                    text-align: center;
                }
                .box {
                    background-color: rgba(50, 0, 0, 0.8);
                    padding: 50px;
                    border-radius: 15px;
                    border: 3px solid #ff4444;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
                }
                h1 { 
                    margin-bottom: 20px; 
                    font-size: 32px; 
                    color: #ff6666;
                }
                p { 
                    font-size: 18px; 
                    margin: 10px 0; 
                }
                a {
                    display: inline-block;
                    margin: 10px 5px;
                    padding: 12px 30px;
                    background-color: #ff4444;
                    color: white;
                    text-decoration: none;
                    border-radius: 10px;
                    font-weight: bold;
                }
                a:hover { 
                    background-color: #cc0000;
                }
            </style>
        </head>
        <body>
            <div class="box">
                <h1>❌ Erro no cadastro!</h1>
                <p>Este e-mail já está cadastrado.</p>
                <p>Tente fazer login ou use outro e-mail.</p>
                <a href="formulario.html">Tentar novamente</a>
                <a href="login.html">Fazer login</a>
            </div>
        </body>
        </html>
        <?php
    }
} else {
    // Se acessar diretamente sem enviar formulário
    header('Location: formulario.html');
    exit;
}
?>