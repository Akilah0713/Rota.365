<?php 
    include('conexao.php');
    # Captura os dados do formulário de cadastro
    $nome = $_POST['nomeCompleto'];
    $nascimento = $_POST['dataNascimento'];
    $cpf = $_POST['cpf'];
    $rg = $_POST ['rg'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    # valida dados vazios 
    if(empty($nomeCompleto) ||empty($nascimento) || empty ($cpf) || empty($rg) || empty($email) || empty($senha) ){die("Preencha todos os campos!");}
    # Aplica criptografia na senha 
    $senha_segura = password_hash($senha,PASSWORD_DEFAULT);
    # Cria comando SDQL de inserção de dados
    $sql = "INSERT INTO usuarios (nomeCompleto, data_de_nascimento, cpf, rg, email, senha_segura) VALUES ('$nomeCompleto', '$nascimento', '$cpf', '$rg', '$email', '$senha_segura')";
    # "ssss" indica que os 4 parâmetro são strings
    $stms->bind_param("ssss", $nomeCompleto, $nascimento, $cpf, $rg, $email, $senha_segura);
    # Executa o código acima dentro do banco de dados
    if($stms->execute()){
        # Redireciona o usuário para a página de login após o cadastro
        header("Location: ../pages/login.php");
    } else{ echo "Erro ao cadastrar: " . $conexao->error;}
    $stms->close();
    $conexao->close();
    ?>