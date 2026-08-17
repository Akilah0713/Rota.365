<?php
# Inclui o arquivo de conexão
include('conexao.php');

# Executa a função de iniciar sessão do usuário
session_start();

# Caso o usuário não esteja logado, redireciona para a página de login
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../pages/login.php");
    exit();
}

# Armazena o ID do usuário logado na variável ID
$id = $_SESSION['id_usuario'];

# Verifica se o usuário enviou o formulário de alteração (POST)
