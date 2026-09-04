<?php require_once('../php/busca.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca de Destinos</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="preload">
    <header>
        <a id="logoClaro" href="index.php"><img src="../src/assets/imagens/logo-modo-claro-sem-fundo.png" alt="Logo clara"></a>
        <a id="logoEscuro" href="index.php" style="display: none;"><img src="../src/assets/imagens/logo-modo-escuro-sem-fundo.png" alt="Logo escura"></a>
        <nav class="menu">
            <div class="menu-container">
                <div class="menu-toggle" id="menuToggle">☰</div>
                <ul id="menuLinks">
                    <li><a href="index.php">🏠 Início</a></li>
                    <li><a href="#nacionais">✈️ Nacionais</a></li>
                    <li><a href="#internacionais">🌍 Internacionais</a></li>
                    <li><a href="../src/pages/reservas.php">🧳 Reservas</a></li>
                    <li><a href="#contato">📞 Contato</a></li>
                </ul>
            </div>
        </nav>
        <div class="menu dropdown">
            <button class="dropbtn"><img src="../src/assets/imagens/usuários modo claro.jpg" alt="Usuário"></button>
            <div class="dropdown-content">
                <?php if (isset($_SESSION['id_usuario'])): ?>
                    <a href="../src/pages/conta.php" class="nav-link <?php echo ($pagina_atual === 'conta.php') ? 'ativo' : ''; ?>">Meu Perfil</a>
                    <a href="../src/php/logout.php" class="nav-link">Sair</a>
                <?php else: ?>
                    <a href="../src/pages/login.php" class="nav-link <?php echo ($pagina_atual === 'login.php') ? 'ativo' : ''; ?>">Entrar</a>
                    <a href="../src/pages/criar-conta.php" class="nav-link <?php echo ($pagina_atual === 'cadastro.php') ? 'ativo' : ''; ?>">Cadastrar-se</a>
                <?php endif; ?>
            </div>
        </div>
        <button id="modoEscuro">🌙</button>
    </header>

    <main class="container">
        <div class="resultado-busca-container">

            <div class="busca-info-bar">
                <div>
                    <h1 class="busca-titulo">
                        <?php if (!empty($pesquisa)): ?>
                            Resultados para: <span class="termo-pesquisado">"<?= htmlspecialchars($pesquisa) ?>"</span>
                        <?php else: ?>
                            Todos os Destinos
                        <?php endif; ?>
                    </h1>
                </div>

                <div class="busca-controles">
                    <span class="contador-resultados">
                        <strong><?= count($destinos) ?></strong> destino(s) encontrado(s)
                    </span>
                </div>
            </div>

            <?php if (!empty($destinos)): ?>
                <section id="destinos">
                    <?php foreach ($destinos as $destino): ?>
                        <a href="destino.php?id=<?= $destino['id'] ?? $destino['id_destino'] ?>" class="card-link">
                            <article class="card">

                                <span class="badge-classificacao">
                                    📍 <?= htmlspecialchars($destino['localizacao'] ?? 'Destino turístico') ?>
                                </span>

                                <div class="card-capa">
                                    <?php if (!empty($destino['imagem'])): ?>
                                        <img src="../../<?= htmlspecialchars($destino['imagem']) ?>" alt="<?= htmlspecialchars($destino['nome']) ?>">
                                    <?php else: ?>
                                        <div class="capa-placeholder">Sem imagem</div>
                                    <?php endif; ?>
                                </div>

                                <span class="genero-tag">
                                    <?= htmlspecialchars($destino['tipo'] ?? 'Viagem') ?>
                                </span>

                                <h2>
                                    <?= htmlspecialchars($destino['nome']) ?>
                                </h2>

                                <p>
                                    <?= htmlspecialchars($destino['descricao'] ?? 'Conheça este destino e planeje sua próxima viagem.') ?>
                                </p>

                                <?php if (isset($destino['preco'])): ?>
                                    <strong class="preco-destino">
                                        A partir de R$ <?= number_format($destino['preco'], 2, ',', '.') ?>
                                    </strong>
                                <?php endif; ?>

                            </article>
                        </a>
                    <?php endforeach; ?>
                </section>

            <?php else: ?>

                <div class="sem-resultados">
                    <svg class="sem-resultados-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        <line x1="8" y1="11" x2="14" y2="11"></line>
                    </svg>

                    <h2>Nenhum destino encontrado</h2>

                    <p>
                        Não encontramos nenhum destino correspondente à sua busca.
                    </p>

                    <a href="index.php" class="botao">
                        Voltar aos Destinos
                    </a>
                </div>

            <?php endif; ?>

        </div>
    </main>

    <footer id="contato">
        <p>Contato: contato@rota365.com | Tel: (61) 4002-8922</p>
        <p>Redes sociais: @rota365</p>
        <p>Todos os Direitos reservados</p>
    </footer>

    <script src="../assets/js/script.js" defer></script>
</body>
</html>