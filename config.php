<?php
// config.php - Conexão com Banco de Dados SQLite

$conexao = new PDO("sqlite:lais.db");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Cria a tabela COM senha
$conexao->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    senha TEXT NOT NULL,
    telefone TEXT,
    genero TEXT,
    data_nascimento DATE,
    cidade TEXT,
    estado TEXT,
    endereco TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");
?>