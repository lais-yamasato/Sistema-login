# 🔐 Sistema de Login e Cadastro

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

**Sistema completo de autenticação com cadastro de usuários**

[Ver Demo](#-demonstração) • [Características](#-características) • [Instalação](#-como-instalar) • [Uso](#-como-usar)

</div>

---

## 📋 Sobre o Projeto

Sistema web desenvolvido para gerenciar **login** e **cadastro de usuários** com armazenamento seguro de dados em banco SQLite. Perfeito para aprender os fundamentos de autenticação web!

### ✨ Características

- 🎨 **Interface Moderna**: Design responsivo e atraente
- 🔒 **Segurança**: Senhas criptografadas com `password_hash()`
- 💾 **Banco SQLite**: Leve e sem necessidade de servidor SQL
- 📝 **Cadastro Completo**: Coleta nome, email, telefone, endereço e mais
- ✅ **Validação**: Verificação de dados e e-mails duplicados
- 🚀 **Fácil de Usar**: Setup simples com XAMPP

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Descrição |
|------------|-----------|
| ![PHP](https://img.shields.io/badge/-PHP-777BB4?style=flat&logo=php&logoColor=white) | Linguagem backend |
| ![SQLite](https://img.shields.io/badge/-SQLite-003B57?style=flat&logo=sqlite&logoColor=white) | Banco de dados |
| ![HTML5](https://img.shields.io/badge/-HTML5-E34F26?style=flat&logo=html5&logoColor=white) | Estrutura das páginas |
| ![CSS3](https://img.shields.io/badge/-CSS3-1572B6?style=flat&logo=css3&logoColor=white) | Estilização |

---

## 📂 Estrutura do Projeto

```
sistema-login/
│
├── 📄 login.html           # Página de login
├── 📄 formulario.html      # Página de cadastro
├── 🐘 login.php           # Processa o login
├── 🐘 formulario.php      # Processa o cadastro
├── ⚙️ config.php          # Configuração do banco
├── 🗄️ lais.db             # Banco de dados SQLite
└── 📖 README.md           # Este arquivo
```

---

## 🚀 Como Instalar

### Pré-requisitos

- 💻 **XAMPP** instalado ([Download aqui](https://www.apachefriends.org/))
- 🌐 Navegador web moderno

### Passo a passo

1️⃣ **Clone o repositório**
```bash
git clone https://github.com/lais-yamasato/sistema-login.git
```

2️⃣ **Mova para a pasta do XAMPP**
```bash
# Windows
C:\xampp\htdocs\sistema-login\

# Linux/Mac
/opt/lampp/htdocs/sistema-login/
```

3️⃣ **Inicie o Apache no XAMPP**
- Abra o XAMPP Control Panel
- Clique em **Start** no Apache

4️⃣ **Acesse no navegador**
```
http://localhost/sistema-login/login.html
```

---

## 💻 Como Usar

### 1. Cadastro de Usuário

1. Acesse a página de login
2. Clique em **"Cadastre-se"**
3. Preencha todos os campos:
   - ✏️ Nome completo
   - 📧 E-mail
   - 🔑 Senha
   - 📞 Telefone
   - 👤 Gênero
   - 🎂 Data de nascimento
   - 🏙️ Cidade e Estado
   - 🏠 Endereço
4. Clique em **Cadastrar**

### 2. Fazer Login

1. Na página de login, insira:
   - 📧 Seu e-mail cadastrado
   - 🔑 Sua senha
2. Clique em **Entrar**
3. ✅ Veja suas informações na tela de boas-vindas!

---

## 🗃️ Banco de Dados

O sistema cria automaticamente uma tabela `usuarios` com os seguintes campos:

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `id` | INTEGER | ID único (auto incremento) |
| `nome` | TEXT | Nome completo |
| `email` | TEXT | E-mail (único) |
| `senha` | TEXT | Senha criptografada |
| `telefone` | TEXT | Número de telefone |
| `genero` | TEXT | Gênero do usuário |
| `data_nascimento` | DATE | Data de nascimento |
| `cidade` | TEXT | Cidade |
| `estado` | TEXT | Estado |
| `endereco` | TEXT | Endereço completo |
| `created_at` | DATETIME | Data de cadastro |

---

## 🔒 Segurança

- 🛡️ **Senhas criptografadas** com `password_hash()` (bcrypt)
- 🚫 **Proteção contra SQL Injection** com prepared statements
- ✅ **Validação de e-mail único** no banco de dados
- 🔐 **Dados sensíveis protegidos** com htmlspecialchars()

---

## 📸 Visualizar Dados do Banco

### Opção 1: VSCode Extension
1. Instale a extensão **SQLite Viewer**
2. Abra o arquivo `lais.db`
3. Visualize a tabela `usuarios`

### Opção 2: DB Browser
1. Baixe [DB Browser for SQLite](https://sqlitebrowser.org/)
2. Abra o arquivo `lais.db`
3. Navegue pela tabela

### Opção 3: Criar `ver_usuarios.php`
Crie um arquivo para visualizar os dados via web! 👀

---

## 🤝 Contribuindo

Contribuições são bem-vindas! Sinta-se à vontade para:

1. 🍴 Fork o projeto
2. 🌿 Criar uma branch (`git checkout -b feature/NovaFuncionalidade`)
3. 💾 Commit suas mudanças (`git commit -m 'Adiciona nova funcionalidade'`)
4. 📤 Push para a branch (`git push origin feature/NovaFuncionalidade`)
5. 🔃 Abrir um Pull Request

---

## 📝 Licença

Este projeto está sob a licença MIT. Veja o arquivo `LICENSE` para mais detalhes.

---

## 👨‍💻 Autor

Desenvolvido com 💜 por **[Lais Naomy]**

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/lais-yamasato)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://linkedin.com/in/www.linkedin.com/in/lais-yamasato-1b4843215)

---

## 📞 Suporte

Encontrou algum problema? Tem alguma sugestão?

- 🐛 Abra uma [issue](https://github.com/lais-yamasato/sistema-login/issues)
- 💬 Entre em contato pelo e-mail: nakanolais@gmail.com

---

<div align="center">

### ⭐ Se este projeto te ajudou, deixe uma estrela!

**Feito com ❤️ e muito ☕**

</div>
