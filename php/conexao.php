<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "senac";
    $banco = "rota.365";
    $porta = 3307;

    $conexao = new mysqli($servidor, $usuario, $senha, $banco, $porta);

    if($conexao->connect_error){
        die("Falha na conexão ". $conexao->connect_error);
    }
    $conexao->set_charset("utf8mb4");
?>
