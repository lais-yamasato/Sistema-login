<?php
include_once('config.php');

// Variável para mensagem
$mensagem = "";

if (isset($_POST['submit'])){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa!
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    $sql = "INSERT INTO usuarios (nome, email, senha, telefone, genero, data_nascimento, cidade, estado, endereco) 
            VALUES (:nome, :email, :senha, :telefone, :genero, :data_nascimento, :cidade, :estado, :endereco)";

    try {
        $stmt = $conexao->prepare($sql);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':genero', $sexo);
        $stmt->bindParam(':data_nascimento', $data_nasc);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':endereco', $endereco);
        
        $stmt->execute();
        
        $mensagem = "<div style='color: green; padding: 10px; background: rgba(0,255,0,0.1); border-radius: 5px; margin: 10px 0;'>
                        ✅ Cadastro realizado com sucesso!<br>
                        <a href='login.php' style='color: green;'>Fazer login agora</a>
                     </div>";
        
    } catch(PDOException $e) {
        if (strpos($e->getMessage(), 'UNIQUE constraint') !== false) {
            $mensagem = "<div style='color: red; padding: 10px; background: rgba(255,0,0,0.1); border-radius: 5px; margin: 10px 0;'>
                            ❌ Este e-mail já está cadastrado!
                         </div>";
        } else {
            $mensagem = "<div style='color: red; padding: 10px; background: rgba(255,0,0,0.1); border-radius: 5px; margin: 10px 0;'>
                            ❌ Erro: " . $e->getMessage() . "
                         </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: black;
            padding: 15px;
            border-radius: 15px;
            width: 25%;
            color: white;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius:8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right, rgb(20,147,220), rgb(31, 155, 212));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));
        }
        .links{
            text-align: center;
            margin-top: 10px;
        }
        .links a{
            color: dodgerblue;
            text-decoration: none;
            font-size: 14px;
        }
        .links a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="" method="POST">
            <fieldset>
            <legend><b>Formulário de Clientes</b></legend>
            
            <?php echo $mensagem; ?>
            
            <br>
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="labelInput">Nome completo</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="email" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">Email</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="labelInput">Senha</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                <label for="telefone" class="labelInput">Telefone</label>
            </div>
            
            <p>Sexo:</p>
            <input type="radio" id="feminino" name="genero" value="feminino" required>
                <label for="feminino">Feminino</label>
            <br>
            <input type="radio" id="masculino" name="genero" value="masculino" required>
                <label for="masculino">Masculino</label>
            <br>
            <input type="radio" id="outro" name="genero" value="outro" required>
                <label for="outro">Outro</label>
            <br>
            
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
            
            <br><br><br>
            <div class="inputBox">
                <input type="text" name="cidade" id="cidade" class="inputUser" required>
                <label for="cidade" class="labelInput">Cidade</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="estado" id="estado" class="inputUser" required>
                <label for="estado" class="labelInput">Estado</label>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="endereco" id="endereco" class="inputUser" required>
                <label for="endereco" class="labelInput">Endereço</label>
            </div>
            <br><br>
            <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
        <div class="links">
            <a href="login.php">Já tem conta? Fazer login</a>
        </div>
    </div>
</body>
</html>