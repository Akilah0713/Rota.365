<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include("../php/conexao.php");

if (!isset($_SESSION['id_usuario'])) {
  header("Location: login.php");
  exit();
}

$sql = "SELECT nome_completo, data_de_nascimento, email, tipo_usuario, pergunta_seguranca FROM usuarios WHERE id_usuario = ?";
$stms = $conexao->prepare($sql);
$stms->bind_param("i", $id_usuario);
$stms->execute();
$usuario = $stms->get_result()->fetch_assoc();
$stms->close();

$nome_exibicao = !empty($usuario['nome_completo']);
date_default_timezone_set('America/Sao_Paulo');

$hora = (int) date('H');
if ($hora >= 5 && $hora < 12) {
  $saudacao = "Bom dia";    
} elseif ($hora >= 12 && $hora < 18) {
  $saudacao = "Boa tarde";
} else {
  $saudacao = "Boa noite";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Minha Conta</title>
  <link rel="stylesheet" href="../src/assets/css/style.css">
</head>
<body>
    <header>
    <a id="logoClaro" href="index.php"><img src="../assets/imagens/imagem logo modo claro.jpg" alt="Logo clara"></a>
    <a id="logoEscuro" href="index.php" style="display: none;"><img src="../assets/imagens/imagem logo modo escuro.jpg" alt="Logo escura"></a>
    
    <nav class="menu">
       <div class="menu-container">
        
        <div class="menu-toggle" id="menuToggle">
          ☰
        </div>
        
      <ul id="menuLinks">
        <li><a href="index.php">🏠 Início</a></li>
        <li><a href="#nacionais">✈️ Nacionais</a></li>
        <li><a href="#internacionais">🌍 Internacionais</a></li>
        <li><a href="reserva.php">🧳 Reservas</a></li>
        <li><a href="#contato">📞 Contato</a></li>
      </ul>
    </div>
    </nav>

    <div class="menu dropdown">
      <button class="dropbtn"><img src="./imagens/usuários modo claro.jpg"></button>
      <div class="dropdown-content">
        <div class="logado d-none">
          <a href="account.php">Minha conta</a>
          <a href="reservas.php">Reservas</a>
          <a href="sair">Sair </a>
        </div>
        <div class="deslogado">
          <a href="login.php">Entrar</a>
          <a href="criar-conta.php">Cadastrar</a>
          <a href="./php/logout.php">Sair</a>
        </div>
    </div>
    
    <button id="modoEscuro">🌙</button>
  </header>

  <aside class="sidebar">
    <h2>Menu</h2>
    <ul>
      <li><a href="#">Menu Perfil</a></li>
      <li><a href="#"> Meus Favoritos</a></li>
      <li><a href="#"> Minhas Compras</a></li>
      <li><a href="../php/logout.php">Sair</a></li>
    </ul>
  </aside>

  <main class="content">      
    <section id="formularioMinhaconta">      
      <div class="card"> 
        <h2><?= $saudacao ?>, <span class="destaque-nome"><?php htmlspecialchars($nome_exibicao); ?></span>! 👋 </h2>
        <p>Gerencie suas informações abaixo:</p>  
        <!-- O formulário virá aqui -->        
        <form action="../php/dashboard.php"
        method="POST">
        <!-- Campos virão aqui --> 
          <label>Nome completo:</label>
          <input type="text" id="nome" required></header>

          <label>Data de nascimento:</label>
          <input type="date" id="datanascimento" required>

          <label>CPF:</label>
          <input type="text" id="nome" required></header>

          <label>RG:</label>
          <input type="text" id="nome" required></header>

          <label>Email cadastrado:</label>
          <input type="email" id="nome" required></header>

          <button id="Atualizar">Atualizar dados</button>
          <p id="erro" class="erro"></p>
        </form> 
      </div>

     <script src="../assets/js/script.js"></script>
</body>
</html>