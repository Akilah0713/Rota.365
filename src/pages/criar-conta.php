<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar conta</title>
  <link rel="stylesheet" href="style.css">
</head>

<body id="paginaCriarConta">
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
    <section id="formularioCriarconta">
      <h2>Criar minha conta</h2>
      <h3>Informe os seus dados abaixo para criar sua conta</h3>

        <form method="POST" action="./php/cadastro.php">
        <label for="nomeCompleto">Nome Completo:</label>
        <input name="nomeCompleto" type="text" id="nomeCompleto" required>

        <label for="dataNascimento">Data de nascimento:</label>
        <input name="dataNascimento" type="date" id="dataNascimento" required>

        <label for="cpf">CPF:</label>
        <input name="cpf" type="text" id="cpf" required>

        <label for="rg">RG:</label>
        <input name="rg" type="text" id="rg" required>

        <label for="email">Email:</label>
        <input name="email" type="email" id="email" required>

        <label for="senha">Senha:</label>
        <input name="senha" type="password" id="senha" required>
        <div class="checkbox">
          <input type="checkbox">
          <p>
            Estou ciente e CONCORDO com os termos de aceite e políticas de privacidade da Rota.365
          </p>
        </div>
  
        <div class="container">
          <button class="button" type="submit" id="criar">Criar conta</button>
          <a class="button" href="login.html" id="voltar">Voltar para o login</a>
          <p id="erro" class="erro"></p>
        </div>
      </form>
    </section>
  </main>
  <footer id="contato">
      <p>Contato: contato@rota365.com | Tel: (61) 4002-8922</p>
      <p>Redes sociais: @rota365</p>
      <p>Todos os Direitos reservados</p>
  </footer>
  <script src="script.js"></script>
</body>

</html>