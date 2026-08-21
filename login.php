<!DOCTYPE php>
<php lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body id="paginaLogin">
  <header>
    <a id="logoClaro" href="index.php"><img src="./imagens/logo-modo-claro-sem-fundo.png" alt="Logo clara"></a>
    <a id="logoEscuro" href="index.php" style="display: none;"><img src="./imagens/logo-modo-escuro-sem-fundo.png" alt="Logo escura"></a>
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
    </div>

    <button id="modoEscuro">🌙</button>
  </header>

  <main>
    <section>
      <div class="container">
        <div class="card login">
          <h2>Acesse sua conta</h2>
          <p>Informe seus dados para continuar</p>
          <form method="POST" action="./php/login.php">
            <label>Email:</label>
            <input type="email" id="nome" required placeholder="Email*"></header>

            <label>Senha:</label>
            <input type="password" id="nome" required placeholder="Senha*">

            <button id="acessar">Acessar conta</button>
          </form>
        </div>
        <div class="card cadastro">
          <img src="imagens/usuarios.png">
          <h2>Novo por aqui?</h2>
          <p>Crie sua conta e aproveite todos os benefícios de ser um cliente Rota.365</p>
          <a href="criar-conta.php" id="criar">Criar conta</a>
        </div>
    </section>
  </main>

  <footer id="contato">
       <p>Contato: contato@rota365.com | Tel: (61) 4002-8922</p>
       <p>Redes sociais: @rota365</p>
       <p>Todos os Direitos reservados</p>
  </footer>

  <script src="script.js"></script>

</body>

</php>