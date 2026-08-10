<?php 
    include('conexao.php');
    # Captura os dados do formulário de cadastro
    $nome = $_POST['nome'];
    $sobrenome = $_['sobrenome']
    $nascimento = $_POST['nascimento'];
    $cpf = $_POST['cpf'];
    $rg = $_POST ['rg']
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    # valida dados vazios 
    if(empty($nome) || empty($sobrenome) ||empty($nascimento) || empty ($cpf) || empty($rg) || empty($email) || empty($senha) ){die("Preencha todos os campos!");}
    # Aplica criptografia na senha 
    $senha_segura = password_hash($senha,PASSWORD_DEFAULT);
    # Cria comando SDQL de inserção de dados
    $sql = "INSERT INTO usuarios (nome, sobrenome, nascimento, cpf, rg, email, senha_segura) VALUES ('$nome', '$sobrenome', '$nascimento', '$cpf', '$rg', '$email', '$senha_segura')";
    # Executa código acima dentro do banco de dados 
    $conexao->query($sql);
    header("Location: loguin.html");
    exit();
    ?>