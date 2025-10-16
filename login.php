<?php
// Inclui o arquivo de configuração
require_once 'config.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['password'];
    
    // Tenta fazer login usando a função do config.php
    $usuario = fazerLogin($email, $senha);
    
    if ($usuario) {
        // Login bem-sucedido!
        ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login Realizado</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                body {
                    font-family: Arial, sans-serif;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    color: white;
                    text-align: center;
                }
                .box {
                    background: rgba(255, 255, 255, 0.15);
                    padding: 50px;
                    border-radius: 15px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                    backdrop-filter: blur(10px);
                }
                h1 { 
                    margin-bottom: 20px; 
                    font-size: 32px; 
                }
                p { 
                    font-size: 18px; 
                    margin: 10px 0; 
                }
                .info-box {
                    background: rgba(255, 255, 255, 0.1);
                    padding: 20px;
                    border-radius: 10px;
                    margin: 20px 0;
                    text-align: left;
                }
                .info-box p {
                    margin: 8px 0;
                }
                .info-box strong {
                    color: #e0e0e0;
                }
                a {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 12px 30px;
                    background: white;
                    color: #667eea;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                }
                a:hover { 
                    opacity: 0.9; 
                }
            </style>
        </head>
        <body>
            <div class="box">
                <h1>✅ Login realizado com sucesso!</h1>
                <p>Bem-vindo(a) de volta!</p>
                
                <div class="info-box">
                    <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario['nome']); ?></p>
                    <p><strong>E-mail:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
                    <p><strong>Telefone:</strong> <?php echo htmlspecialchars($usuario['telefone']); ?></p>
                    <p><strong>Cidade:</strong> <?php echo htmlspecialchars($usuario['cidade']); ?> - <?php echo htmlspecialchars($usuario['estado']); ?></p>
                    <p><strong>Cadastrado em:</strong> <?php echo date('d/m/Y', strtotime($usuario['created_at'])); ?></p>
                </div>
                
                <a href="login.html">Voltar para o login</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Login falhou!
        ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Erro no Login</title>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }
                body {
                    font-family: Arial, sans-serif;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    color: white;
                    text-align: center;
                }
                .box {
                    background: rgba(255, 50, 50, 0.2);
                    padding: 50px;
                    border-radius: 15px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                    backdrop-filter: blur(10px);
                }
                h1 { 
                    margin-bottom: 20px; 
                    font-size: 32px; 
                }
                p { 
                    font-size: 18px; 
                    margin: 10px 0; 
                }
                a {
                    display: inline-block;
                    margin: 10px 5px;
                    padding: 12px 30px;
                    background: white;
                    color: #c62828;
                    text-decoration: none;
                    border-radius: 5px;
                    font-weight: bold;
                }
                a:hover { 
                    opacity: 0.9; 
                }
            </style>
        </head>
        <body>
            <div class="box">
                <h1>❌ Erro no login!</h1>
                <p>E-mail ou senha incorretos.</p>
                <p>Verifique seus dados e tente novamente.</p>
                <a href="login.html">Tentar novamente</a>
                <a href="formulario.html">Cadastrar-se</a>
            </div>
        </body>
        </html>
        <?php
    }
} else {
    // Se acessar diretamente sem enviar formulário
    header('Location: login.html');
    exit;
}
?>