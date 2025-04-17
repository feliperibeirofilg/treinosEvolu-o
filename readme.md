# 🏋️ Sistema de Cadastro de Treinos

Este é um sistema web simples para cadastro de treinos, com funcionalidades de login, senha e cadastro de novos usuários. Ideal para academias ou projetos de controle pessoal de treinos.

# Tecnologias utilizadas
- PHP
- MySQL
- HTML/CSS
- GitHub para versionamento de código

# Funcionalidades:
- Cadastro de usuarios
- Login
- Adicionar novos treinos para cada user
- Editar treinos existentes
- Excluir treinos
- Detalhar treino

## 🚀 Como rodar o projeto localmente

### Pré-requisitos:

- [XAMPP](https://www.apachefriends.org/index.html) ou outro ambiente com **Apache** e **MySQL** (como Laragon ou WAMP)
- Navegador web
- phpMyAdmin configurado

### Passos:

1. Clone o repositório ou baixe os arquivos:
   git clone https://github.com/feliperibeirofilg/treinosEvolucao/

2. Copie os arquivos do projeto para a pasta htdocs (caso esteja usando o XAMPP):

C:/xampp/htdocs/Treinosevolucao

3. Inicie o Apache e o MySQL no painel do XAMPP.

4. Acesse o phpMyAdmin (geralmente via http://localhost/phpmyadmin) e:

5. Crie um banco de dados com o nome: academia pessoal;

-- Criar o banco de dados

CREATE DATABASE academia_pessoal;
USE academia_pessoal;

-- Criar a tabela de usuários

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL
);

-- Criar a tabela de treinos

CREATE TABLE trains (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    peso INT NOT NULL,
    treino VARCHAR(100) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

6. Ajuste o arquivo de conexão com as seguintes configurações

$host = 'localhost';
$usuario = 'root';
$senha = ''; // senha em branco no XAMPP por padrão
$banco = 'academia_pessoal';