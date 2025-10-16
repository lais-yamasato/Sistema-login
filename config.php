<?php
// config.php - Configuração do Banco de Dados SQLite

try {
    // Cria/conecta com o banco lais.db
    $db = new PDO('sqlite:lais.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Cria a tabela usuarios com todos os campos do formulário
    $db->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        senha TEXT NOT NULL,
        telefone TEXT NOT NULL,
        genero TEXT NOT NULL,
        data_nascimento DATE NOT NULL,
        cidade TEXT NOT NULL,
        estado TEXT NOT NULL,
        endereco TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    
} catch(PDOException $e) {
    die("Erro ao conectar com o banco: " . $e->getMessage());
}

// Função para fazer login
function fazerLogin($email, $senha) {
    global $db;
    
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        return $usuario; // Login bem-sucedido
    }
    return false; // Login falhou
}

// Função para cadastrar usuário completo
function cadastrarUsuario($nome, $email, $senha, $telefone, $genero, $data_nascimento, $cidade, $estado, $endereco) {
    global $db;
    
    try {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        
        $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha, telefone, genero, data_nascimento, cidade, estado, endereco) 
                             VALUES (:nome, :email, :senha, :telefone, :genero, :data_nascimento, :cidade, :estado, :endereco)");
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':endereco', $endereco);
        
        $stmt->execute();
        
        return true; // Cadastro bem-sucedido
    } catch(PDOException $e) {
        return false; // Erro no cadastro (email duplicado, etc)
    }
}
?>