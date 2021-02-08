-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06-Fev-2021 às 21:59
-- Versão do servidor: 8.0.23-0ubuntu0.20.04.1
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_ttd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensor`
--

CREATE TABLE `sensor` (
  `id` int NOT NULL,
  `descricao` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `endereco` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `nivel_son` tinyint NOT NULL DEFAULT '1' COMMENT 'Nível de poluição sonora'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sensor`
--

INSERT INTO `sensor` (`id`, `descricao`, `endereco`, `lat`, `lng`, `nivel_son`) VALUES
(1, 'Casa do João Vitor', 'Rua Doze, 294, Crispim Santana, Arinos-MG', -15.916121, -46.092510, 1),
(2, 'Padaria Maria do Carmo', 'Rua Dez, Crispim Santana, Arinos-MG', -15.915685, -46.093678, 2),
(3, 'Mercado Zé Bagunça', 'Rua Seis, Crispim Santana, Arinos-MG', -15.914350, -46.095680, 1),
(4, 'Big Hotel', 'Av. José Fernandes Valadares, 670-750, Arinos-MG', -15.910441, -46.113102, 3),
(5, 'Lanternagem e Pintura dois irmãos', 'R. João Oliveira Campos, 240 - Primavera, Arinos - MG, 38680-000, Brasil', -15.907568, -46.105072, 3),
(6, 'R. Juscelina Leonidia Rocha, 288', '', -15.910096, -46.107929, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
