<?php
include('conexao.php');
// Captura os dados do formulário
$nomeCompleto = $_POST['nomeCompleto'] ?? '';
$nascimento = $_POST['dataNascimento'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$rg = $_POST['rg'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
// Valida dados vazios
if (
    empty($nomeCompleto) ||
    empty($nascimento) ||
    empty($cpf) ||
    empty($rg) ||
    empty($email) ||
    empty($senha)
) {
    die("Preencha todos os campos!");
}
// Criptografa a senha
$senha_segura = password_hash($senha, PASSWORD_DEFAULT);
// Cria o comando SQL
$sql = "INSERT INTO usuarios (nome_completo, cpf, rg, email, senha_segura, data_de_nascimento) VALUES (?, ?, ?, ?, ?, ?)";
// Prepara a consulta
$stms = $conexao->prepare($sql);
if (!$stms) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}
// "ssssss" = 6 parâmetros do tipo string
$stms->bind_param(
    "ssssss",
    $nomeCompleto,
    $cpf,
    $rg,
    $email,
    $senha_segura,
    $nascimento
);
// Executa
if ($stms->execute()) {
    header("Location: ../login.php");
    exit;
} else {
    echo "Erro ao cadastrar: " . $stms->error;
}
// Fecha conexão
$stms->close();
$conexao->close();

?>