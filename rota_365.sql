-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Tempo de geração: 04/09/2026 às 22:43
-- Versão do servidor: 8.0.44
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rota.365`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int NOT NULL,
  `imagem_destino` varchar(2555) DEFAULT NULL,
  `data_viagem` date NOT NULL,
  `data_retorno` date NOT NULL,
  `tipo_de_voo` enum('direto','com conexao') NOT NULL,
  `titulo_destino` varchar(150) NOT NULL,
  `ida` enum('somente ida','ida e volta') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `classe` enum('padrão',' vip','executiva') NOT NULL DEFAULT 'padrão',
  `valor_por_passageiros` varchar(10) NOT NULL,
  `passageiros` int NOT NULL DEFAULT '1',
  `embarque` varchar(100) NOT NULL,
  `desembarque` varchar(100) NOT NULL,
  `codigo_promocional` varchar(50) DEFAULT NULL,
  `assentos` varchar(9) NOT NULL DEFAULT 'aleatório'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `destinos`
--

INSERT INTO `destinos` (`id_destino`, `imagem_destino`, `data_viagem`, `data_retorno`, `tipo_de_voo`, `titulo_destino`, `ida`, `classe`, `valor_por_passageiros`, `passageiros`, `embarque`, `desembarque`, `codigo_promocional`, `assentos`) VALUES
(1, '../src/assets/imagens/cidade/rio de janeiro.jpg', '2026-12-01', '2026-12-15', 'direto', 'Rio de Janeiro', 'ida e volta', 'padrão', '580,00', 1, 'Brasília', 'Rio de Janeiro', NULL, 'aleatório'),
(2, '../src/assets/imagens/cidade/rio de janeiro.jpg', '2026-12-01', '2026-12-15', 'direto', 'Rio de Janeiro', 'ida e volta', 'executiva', '928,00', 1, 'Brasília', 'Rio de Janeiro', NULL, 'aleatório'),
(3, '../src/assets/imagens/cidade/Salvador 2.jpg', '2026-12-01', '2026-12-15', 'direto', 'Salvador', 'ida e volta', 'padrão', '390,00', 1, 'Brasília', 'Salvador', NULL, 'aleatório'),
(4, '../src/assets/imagens/cidade/Salvador 2.jpg', '2026-12-01', '2026-12-15', 'direto', 'Salvador', 'ida e volta', 'executiva', '579,00', 1, 'Brasília', 'Salvador', NULL, 'aleatório'),
(5, '../src/assets/imagens/cidade/Porto Alegre.jpg', '2026-12-01', '2026-12-15', 'direto', 'Porto Alegre', 'ida e volta', 'padrão', '300,00', 1, 'Brasília', 'Porto Alegre', NULL, 'aleatório'),
(6, '../src/assets/imagens/cidade/Porto Alegre.jpg', '2026-12-01', '2026-12-15', 'direto', 'Porto Alegre', 'ida e volta', 'executiva', '750,00', 1, 'Brasília', 'Porto Alegre', NULL, 'aleatório'),
(7, '../src/assets/imagens/cidade/Esapirito santos.jpg', '2026-12-01', '2026-12-15', 'direto', 'Espirito Santo', 'ida e volta', 'padrão', '250,00', 1, 'Brasília', 'Espirito Santo', NULL, 'aleatório'),
(8, '../src/assets/imagens/cidade/Esapirito santos.jpg', '2026-12-01', '2026-12-15', 'direto', 'Espirito Santo', 'ida e volta', 'executiva', '600,00', 1, 'Brasília', 'Espirito Santo', NULL, 'aleatório'),
(9, '../src/assets/imagens/cidade/icaraí.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Icaraí de Amontada', 'ida e volta', 'padrão', '720,00', 1, 'Brasília', 'Icaraí de Amontada', NULL, 'aleatório'),
(10, '../src/assets/imagens/cidade/icaraí.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Icaraí de Amontada', 'ida e volta', 'executiva', '1.152,00', 1, 'Brasília', 'Icaraí de Amontada', NULL, 'aleatório'),
(11, '../src/assets/imagens/cidade/Nobres.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Nobres', 'ida e volta', 'padrão', '800,00', 1, 'Brasília', 'Nobres', NULL, 'aleatório'),
(12, '../src/assets/imagens/cidade/Nobres.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Nobres', 'ida e volta', 'executiva', '1.280,00', 1, 'Brasília', 'Nobres', NULL, 'aleatório'),
(13, '../src/assets/imagens/cidade/rioGrandeDoSul.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Rio Grande do Sul', 'ida e volta', 'padrão', '1.011,00', 1, 'Brasília', 'Rio Grande do Sul', NULL, 'aleatório'),
(14, '../src/assets/imagens/cidade/rioGrandeDoSul.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Rio Grande do Sul', 'ida e volta', 'executiva', '1.617,00', 1, 'Brasília', 'Rio Grande do Sul', NULL, 'aleatório'),
(15, '../src/assets/imagens/cidade/balneario.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Balneário Camboriú', 'ida e volta', 'padrão', '798,00', 1, 'Brasília', 'Balneário Camboriú', NULL, 'aleatório'),
(16, '../src/assets/imagens/cidade/balneario.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Balneário Camboriú', 'ida e volta', 'executiva', '1.276,00', 1, 'Brasília', 'Balneário Camboriú', NULL, 'aleatório'),
(17, '../src/assets/imagens/cidade/jericoacoara.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Jericoacoara', 'ida e volta', 'padrão', '1.048,00', 1, 'Brasília', 'Jericoacoara', NULL, 'aleatório'),
(18, '../src/assets/imagens/cidade/jericoacoara.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Jericoacoara', 'ida e volta', 'executiva', '1.676,00', 1, 'Brasília', 'Jericoacoara', NULL, 'aleatório'),
(19, '../src/assets/imagens/cidade/Veneza.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Veneza', 'ida e volta', 'padrão', '3.727,00', 1, 'Brasília', 'Veneza', NULL, 'aleatório'),
(20, '../src/assets/imagens/cidade/Veneza.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Veneza', 'ida e volta', 'executiva', '5.963,00', 1, 'Brasília', 'Veneza', NULL, 'aleatório'),
(21, '../src/assets/imagens/cidade/Seoul 2.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Seoul', 'ida e volta', 'padrão', '5.000,00', 1, 'Brasília', 'Seoul', NULL, 'aleatório'),
(22, '../src/assets/imagens/cidade/Seoul 2.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Seoul', 'ida e volta', 'executiva', '9.000,00', 1, 'Brasília', 'Seoul', NULL, 'aleatório'),
(23, '../src/assets/imagens/cidade/Istambul.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Istambul', 'ida e volta', 'padrão', '3.000,00', 1, 'Brasília', 'Istambul', NULL, 'aleatório'),
(24, '../src/assets/imagens/cidade/Istambul.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Istambul', 'ida e volta', 'executiva', '6.500,00', 1, 'Brasília', 'Istambul', NULL, 'aleatório'),
(25, '../src/assets/imagens/cidade/Paris 2.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Paris', 'ida e volta', 'padrão', '4.800,00', 1, 'Brasília', 'Paris', NULL, 'aleatório'),
(26, '../src/assets/imagens/cidade/Paris 2.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Paris', 'ida e volta', 'executiva', '7.000,00', 1, 'Brasília', 'Paris', NULL, 'aleatório'),
(27, '../src/assets/imagens/cidade/Orlando 2.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Orlando', 'ida e volta', 'padrão', '2.700,00', 1, 'Brasília', 'Orlando', NULL, 'aleatório'),
(28, '../src/assets/imagens/cidade/Orlando 2.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Orlando', 'ida e volta', 'executiva', '4.500,00', 1, 'Brasília', 'Orlando', NULL, 'aleatório'),
(29, '../src/assets/imagens/cidade/singapura.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Singapura', 'ida e volta', 'padrão', '7.600,00', 1, 'Brasília', 'Singapura', NULL, 'aleatório'),
(30, '../src/assets/imagens/cidade/singapura.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Singapura', 'ida e volta', 'executiva', '8.800,00', 1, 'Brasília', 'Singapura', NULL, 'aleatório'),
(31, '../src/assets/imagens/cidade/Dubai 2.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Dubai', 'ida e volta', 'padrão', '3.500,00', 1, 'Brasília', 'Dubai', NULL, 'aleatório'),
(32, '../src/assets/imagens/cidade/Dubai 2.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Dubai', 'ida e volta', 'executiva', '7.200,00', 1, 'Brasília', 'Dubai', NULL, 'aleatório'),
(33, '../src/assets/imagens/cidade/Tokyo.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Tokyo', 'ida e volta', 'padrão', '8.404,00', 1, 'Brasília', 'Tokyo', NULL, 'aleatório'),
(34, '../src/assets/imagens/cidade/Tokyo.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Tokyo', 'ida e volta', 'executiva', '13.446,00', 1, 'Brasília', 'Tokyo', NULL, 'aleatório'),
(35, '../src/assets/imagens/cidade/moscou.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Moscou', 'ida e volta', 'padrão', '5.588,00', 1, 'Brasília', 'Moscou', NULL, 'aleatório'),
(36, '../src/assets/imagens/cidade/moscou.jpg', '2026-12-01', '2026-12-15', 'com conexao', 'Moscou', 'ida e volta', 'executiva', '8.943,00', 1, 'Brasília', 'Moscou', NULL, 'aleatório');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `senha_segura` varchar(255) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tipo_usuario` enum('admin','moderador','comum') NOT NULL DEFAULT 'comum',
  `pergunta_seguranca` enum('Qual foi o primeiro destino de viagem que você visitou?','Qual destino você mais gostaria de conhecer?','Qual foi o nome do primeiro hotel em que você se hospedou?','Qual foi sua viagem favorita?','Qual cidade você mais gostou de visitar?','Qual foi o destino da sua primeira viagem de avião?','Qual é o seu tipo de destino favorito?','Qual lugar você gostaria de visitar novamente?','Qual foi o último destino que você visitou?','Qual foi o destino da sua viagem mais inesquecível?') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_completo`, `senha_segura`, `data_de_nascimento`, `cpf`, `rg`, `email`, `tipo_usuario`, `pergunta_seguranca`) VALUES
(1, 'Lucas dos Santos Camilo', '$2y$10$fOrYtBcVrYU7vOAFDHsVTOG/eaxhU492Qo4QhiQPqKiWBbu0BH3JC', '1995-11-28', '37564212020', '34556987', 'lucas.6161@df.senac.br', 'comum', 'Qual foi o primeiro destino de viagem que você visitou?');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `rg` (`rg`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
