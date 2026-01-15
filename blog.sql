-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/01/2026 às 15:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `t-cat`
--

CREATE TABLE `t-cat` (
  `Código` int(11) NOT NULL COMMENT 'Chave-primária.',
  `Categoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Categoria da postagem.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `t-post`
--

CREATE TABLE `t-post` (
  `Código` int(11) NOT NULL COMMENT 'Chave-primária.',
  `Titulo` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Título da postagem.',
  `Subtítulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Subtítulo da postagem.',
  `Figura` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Endereço da imagem da\r\npostagem.',
  `Data` date NOT NULL COMMENT 'Data da postagem.',
  `Texto` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Texto da postagem.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `t_apres`
--

CREATE TABLE `t_apres` (
  `Autor` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nome do autor do blog.',
  `Descr` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Breve descrição sobre o autor do\r\nblog.',
  `Foto` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Foto do autor.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `t_apres`
--

INSERT INTO `t_apres` (`Autor`, `Descr`, `Foto`) VALUES
('Explore', 'Explorando o universo do conhecimento', 'https://www.w3schools.com/w3images/avatar_g.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `t_top5`
--

CREATE TABLE `t_top5` (
  `Código` int(11) NOT NULL COMMENT 'Chave-primária.',
  `Titulo` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Título da postagem.',
  `NCom` int(11) NOT NULL COMMENT 'Número de comentários da\r\npostagem.',
  `Figura` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Endereço da imagem da postagem.',
  `Data` date NOT NULL COMMENT 'Data da coleta das informações para\r\nquestão de histórico e verificação.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
