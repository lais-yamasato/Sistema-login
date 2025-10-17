# 🔐 Sistema de Login e Cadastro

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

**Sistema completo de autenticação com cadastro e login de usuários**

[Características](#-características) • [Tecnologias](#️-tecnologias) • [Instalação](#-instalação) • [Como Usar](#-como-usar) • [Estrutura](#-estrutura-do-projeto)

</div>

---

## 📋 Sobre o Projeto

Sistema web desenvolvido para gerenciar **cadastro e autenticação de usuários** com armazenamento seguro em banco de dados SQLite. Ideal para aprender os fundamentos de desenvolvimento web com PHP!

### ✨ Características

- 🎨 **Interface Moderna e Responsiva**: Dois estilos visuais distintos
- 🔒 **Senhas Criptografadas**: Utiliza `password_hash()` do PHP
- 💾 **Banco SQLite**: Leve, portátil e sem necessidade de servidor adicional
- 📝 **Cadastro Completo**: Nome, email, senha, telefone, gênero, data de nascimento, cidade, estado e endereço
- ✅ **Validações**: Verificação de email único e dados obrigatórios
- 🔐 **Login Seguro**: Autenticação com senha criptografada
- 🚀 **Fácil Setup**: Apenas XAMPP necessário

---

## 🖼️ Demonstração

### 🌟 Tela de Login
Design moderno com gradiente roxo (#667eea → #764ba2)

### 📋 Tela de Cadastro  
Interface escura com detalhes em azul (dodgerblue)

---

## 🛠️ Tecnologias

| Tecnologia | Uso |
|------------|-----|
| **PHP** | Backend e lógica de negócios |
| **SQLite** | Banco de dados relacional |
| **HTML5** | Estrutura das páginas |
| **CSS3** | Estilização e design responsivo |
| **PDO** | Conexão segura com banco de dados |

---

## 📂 Estrutura do Projeto

```
Sistema-login/
│
├── 📄 config.php          # Configuração e conexão com banco SQLite
├── 📄 login.php           # Página de login com autenticação
├── 📄 formulario.php      # Página de cadastro de usuários
├── 🗄️ lais.db             # Banco de dados SQLite (gerado automaticamente)
└── 📖 README.md           # Documentação do projeto
```

---

## 🚀 Instalação

### Pré-requisitos

- 💻 **XAMPP** instalado ([Download aqui](https://www.apachefriends.org/))
- 🌐 Navegador web moderno (Chrome, Firefox, Edge)

### Passo a Passo

**1️⃣ Clone o repositório**
```bash
git clone https://github.com/lais-yamasato/Sistema-login.git
```

**2️⃣ Mova para a pasta do XAMPP**
```bash
# Windows
C:\xampp\htdocs\Sistema-login\

# Linux/Mac
/opt/lampp/htdocs/Sistema-login/
```

**3️⃣ Inicie o Apache no XAMPP**
- Abra o **XAMPP Control Panel**
- Clique em **Start** no **Apache**

**4️⃣ Acesse no navegador**
```
http://localhost/Sistema-login/login.php
```

---

## 💻 Como Usar

### 📝 1. Cadastrar Novo Usuário

1. Acesse `http://localhost/Sistema-login/formulario.php`
2. Preencha todos os campos:
   - ✏️ Nome completo
   - 📧 E-mail (único)
   - 🔑 Senha
   - 📞 Telefone
   - 👤 Gênero (Feminino/Masculino/Outro)
   - 🎂 Data de nascimento
   - 🏙️ Cidade
   - 🗺️ Estado
   - 🏠 Endereço
3. Clique em **Cadastrar**
4. Será redirecionado para fazer login

### 🔐 2. Fazer Login

1. Acesse `http://localhost/Sistema-login/login.php`
2. Insira:
   - 📧 E-mail cadastrado
   - 🔑 Senha
3. Clique em **Entrar**
4. ✅ Visualize seus dados após o login bem-sucedido!

---

## 🗃️ Estrutura do Banco de Dados

O sistema cria automaticamente uma tabela `usuarios` com os seguintes campos:

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `id` | INTEGER | ID único (auto incremento) |
| `nome` | TEXT | Nome completo do usuário |
| `email` | TEXT | E-mail único do usuário |
| `senha` | TEXT | Senha criptografada (bcrypt) |
| `telefone` | TEXT | Número de telefone |
| `genero` | TEXT | Gênero (feminino/masculino/outro) |
| `data_nascimento` | DATE | Data de nascimento |
| `cidade` | TEXT | Cidade do usuário |
| `estado` | TEXT | Estado do usuário |
| `endereco` | TEXT | Endereço completo |
| `created_at` | DATETIME | Data de cadastro (automático) |

---

## 🔒 Segurança

### Medidas Implementadas

- 🛡️ **Senhas Criptografadas**: Usa `password_hash()` com algoritmo bcrypt
- 🚫 **Proteção SQL Injection**: Prepared statements com PDO
- ✅ **E-mail Único**: Constraint UNIQUE no banco de dados
- 🔐 **Dados Protegidos**: `htmlspecialchars()` para prevenir XSS

### Exemplo de Senha Criptografada

```
Senha digitada: minhasenha123
Salva no banco: $2y$10$abcdefghijklmnopqrstuvwxyz...
```

---

## 📸 Visualizar Dados do Banco

### Opção 1: Extensão VSCode
1. Instale **SQLite Viewer** no VSCode
2. Abra o arquivo `lais.db`
3. Visualize a tabela `usuarios`

### Opção 2: DB Browser for SQLite
1. Baixe: [https://sqlitebrowser.org/](https://sqlitebrowser.org/)
2. Abra o arquivo `lais.db`
3. Navegue pela aba "Browse Data"

---

## 🎨 Personalização

### Alterar Cores do Login

Edite `login.php` na seção `<style>`:

```css
/* Gradiente de fundo */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Altere para suas cores preferidas */
background: linear-gradient(135deg, #FF6B6B 0%, #4ECDC4 100%);
```

### Alterar Cores do Cadastro

Edite `formulario.php` na seção `<style>`:

```css
/* Gradiente de fundo */
background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));

/* Cor da borda */
border: 3px solid dodgerblue;
```

---

## 🐛 Solução de Problemas

### ❌ Erro: "Connection refused"
**Solução:** Certifique-se de que o Apache está rodando no XAMPP

### ❌ Erro: "UNIQUE constraint failed"
**Solução:** Esse e-mail já está cadastrado. Use outro e-mail ou delete o usuário existente

### ❌ Erro: "could not find driver"
**Solução:** 
1. Abra `C:\xampp\php\php.ini`
2. Procure por `;extension=pdo_sqlite` e `;extension=sqlite3`
3. Remova o `;` (ponto e vírgula) das duas linhas
4. Reinicie o Apache

### ❌ Banco não está salvando dados
**Solução:** Verifique as permissões de escrita na pasta do projeto

---

## 🤝 Contribuindo

Contribuições são bem-vindas! Para contribuir:

1. 🍴 Faça um Fork do projeto
2. 🌿 Crie uma branch: `git checkout -b feature/MinhaFeature`
3. 💾 Commit suas mudanças: `git commit -m 'Adiciona MinhaFeature'`
4. 📤 Push para a branch: `git push origin feature/MinhaFeature`
5. 🔃 Abra um Pull Request

---

## 📜 Licença

Este projeto está sob a licença MIT. Sinta-se livre para usar, modificar e distribuir.

---

## 👩‍💻 Autora

Desenvolvido com 💜 por **Laís Yamasato**

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/lais-yamasato)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/lais-yamasato)

---

## 📞 Contato

Encontrou algum bug? Tem alguma sugestão?

- 🐛 Abra uma [issue](https://github.com/lais-yamasato/Sistema-login/issues)
- 💬 Entre em contato via [LinkedIn](https://linkedin.com/in/lais-yamasato)

---

<div align="center">

### ⭐ Se este projeto te ajudou, deixe uma estrela!

**Feito com ❤️, ☕ e muito aprendizado!**

</div>