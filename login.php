<?php
include_once('config.php');

$mensagem = "";
$usuario_logado = null;

if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Busca o usuário
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verifica senha
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $usuario_logado = $usuario;
    } else {
        $mensagem = "<div style='color: red; padding: 10px; background: rgba(255,0,0,0.1); border-radius: 5px; margin: 10px 0;'>
                        ❌ E-mail ou senha incorretos!
                     </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        label {
            display: block;
            color: #333;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #667eea;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        a {
            color: #667eea;
            text-decoration: none;
            font-size: 13px;
        }

        a:hover {
            text-decoration: underline;
        }

        .links {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .success-box {
            background: rgba(255, 255, 255, 0.95);
            color: #333;
        }

        .success-box h1 {
            color: #2e7d32;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .info-box {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: left;
        }

        .info-box p {
            margin: 8px 0;
            color: #333;
            text-align: left;
        }

        .info-box strong {
            color: #667eea;
        }

        .btn-voltar {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-voltar:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <?php if ($usuario_logado): ?>
        <!-- TELA DE SUCESSO -->
        <div class="login-container success-box">
            <h1>✅ Login realizado!</h1>
            <p>Bem-vindo(a) de volta!</p>
            
            <div class="info-box">
                <p><strong>Nome:</strong> <?php echo htmlspecialchars($usuario_logado['nome']); ?></p>
                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($usuario_logado['email']); ?></p>
                <p><strong>Telefone:</strong> <?php echo htmlspecialchars($usuario_logado['telefone']); ?></p>
                <p><strong>Cidade:</strong> <?php echo htmlspecialchars($usuario_logado['cidade']); ?> - <?php echo htmlspecialchars($usuario_logado['estado']); ?></p>
                <p><strong>Cadastrado em:</strong> <?php echo date('d/m/Y', strtotime($usuario_logado['created_at'])); ?></p>
            </div>
            
            <div style="text-align: center;">
                <a href="login.php" class="btn-voltar">Sair</a>
            </div>
        </div>
    <?php else: ?>
        <!-- FORMULÁRIO DE LOGIN -->
        <div class="login-container">
            <h1>Bem-vindo</h1>
            <p>Faça login para continuar</p>
            
            <?php echo $mensagem; ?>
            
            <form action="" method="POST">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                
                <button type="submit" name="submit">Entrar</button>
            </form>
            
            <div class="links">
                <a href="#">Esqueceu a senha?</a> | 
                <a href="formulario.php">Cadastre-se</a>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>