<!DOCTYPE php>
<php lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha conta </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <a id="logoClaro" href="index.php"><img src="./imagens/imagem logo modo claro.jpg" alt="Logo clara"></a>
    <a id="logoEscuro" href="index.php" style="display: none;"><img src="./imagens/imagem logo modo escuro.jpg" alt="Logo escura"></a>
    
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

  <main>
    <section id="formularioMinhaconta">

      <div class="card"> 
      <h2>Minha conta</h2>

      <form>
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

     <script src="script.js"></script>
</body>
</php>