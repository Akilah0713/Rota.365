<?php
// Inclui o arquivo de conexão
include('conexao.php');
// Inicia a sessão
session_start();
// Captura os dados enviados pelo formulário
$email = $_POST['email'];
$senha = $_POST['senha'];
// Verifica se os campos foram preenchidos
if (empty($email) || empty($senha)) {
    die("Preencha todos os campos!");
}
// Busca o usuário usando Prepared Statement
$stmt = $conexao->prepare(
    "SELECT * FROM usuarios WHERE email = ?"
);
if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();
// Verifica se o e-mail está cadastrado
if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    // Verifica a senha
    if (password_verify($senha, $usuario['senha_segura'])) {
        // Cria os dados da sessão
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nome'] = $usuario['nome_completo'];
        $_SESSION['email'] = $usuario['email'];

        // Redireciona para a página inicial
        header("Location: ../index.php");
        exit();
    } else {
        echo "Senha incorreta!";
        exit();
    }
} else {
    echo "E-mail não cadastrado!";
    exit();
}
// Fecha a consulta e a conexão
$stmt->close();
$conexao->close();
?>