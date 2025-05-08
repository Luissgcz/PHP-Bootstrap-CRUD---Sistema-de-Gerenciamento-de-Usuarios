# 📄 Projeto CRUD com PHP & Bootstrap

Um sistema simples de gerenciamento de usuários (Create, Read, Update, Delete) utilizando **PHP** puro com **Bootstrap 5** para estilização e **PostgreSQL** como banco de dados..

## 🚀 Tecnologias

- PHP
- Bootstrap 5
- PostgreSQL

## 📂 Estrutura do Projeto

- `index.php` — Página principal
- `addUser.php` — Formulário para adicionar usuário
- `listUsers.php` — Lista todos os usuários
- `updateUser.php` — Edita informações de um usuário
- `deleteUser.php` — Remove um usuário
- `User.php` — Classe responsável pela manipulação dos dados (CRUD)
- `ConnectionDB.php` — Classe Responsável pelas Manipulações no Banco de Dados

## 📋 Requisitos do Banco de Dados

Antes de rodar o sistema, certifique-se de que o banco de dados esteja corretamente configurado:

- É necessário um schema no banco chamado teste.
- Dentro dele, uma tabela usuarios com as seguintes colunas:

  ```
   CREATE SCHEMA IF NOT EXISTS teste;

   CREATE TABLE IF NOT EXISTS teste.usuarios (
   id SERIAL PRIMARY KEY,
   nome VARCHAR(100) NOT NULL,
   email VARCHAR(100) NOT NULL UNIQUE
   );
  ```

## 🛠️ Como rodar

1. Suba um servidor PHP:

   ```
   php -S localhost:8000
   ```

2. Crie um arquivo .env na raiz do projeto com as variáveis de configuração do banco de dados. Exemplo de um arquivo .env:

   ```
   # .env
   DB_HOST=seu_host
   DB_NAME=seu_banco_de_dados
   DB_USER=seu_usuario
   DB_PASS=sua_senha
   DB_PORT=sua_porta
   ```
