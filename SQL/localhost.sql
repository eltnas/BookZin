-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03/04/2023 às 14:07
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bookzin`
--
CREATE DATABASE IF NOT EXISTS `bookzin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookzin`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bkz_clientes`
--

CREATE TABLE `bkz_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(200) DEFAULT NULL,
  `email_cliente` varchar(200) DEFAULT NULL,
  `senha_cliente` varchar(255) DEFAULT NULL,
  `endereco_cliente` varchar(200) DEFAULT NULL,
  `telefone_cliente` varchar(13) DEFAULT NULL,
  `celular_cliente` varchar(14) DEFAULT NULL,
  `wtp_cliente` tinyint(1) DEFAULT NULL,
  `cfp_cliente` int(11) DEFAULT NULL,
  `rg_cliente` varchar(10) DEFAULT NULL,
  `dataNasc_cliente` date DEFAULT NULL,
  `registro_sistema` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bkz_user`
--

CREATE TABLE `bkz_user` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(200) DEFAULT NULL,
  `usr_user` varchar(50) NOT NULL,
  `email_user` varchar(200) DEFAULT NULL,
  `senha_user` varchar(255) DEFAULT NULL,
  `endereco_user` varchar(200) DEFAULT NULL,
  `telefone_user` varchar(13) DEFAULT NULL,
  `celular_user` varchar(14) DEFAULT NULL,
  `wtp_user` tinyint(1) DEFAULT NULL,
  `cpf_user` int(11) DEFAULT NULL,
  `rg_user` varchar(10) DEFAULT NULL,
  `dataNasc_user` date DEFAULT NULL,
  `registro_user` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `bkz_user`
--

INSERT INTO `bkz_user` (`id_user`, `nome_user`, `usr_user`, `email_user`, `senha_user`, `endereco_user`, `telefone_user`, `celular_user`, `wtp_user`, `cpf_user`, `rg_user`, `dataNasc_user`, `registro_user`) VALUES
(1, 'Elton Carlos do Nascimento', 'Zin', 'eltnas@outlook.com', 'e372105c5613c29d72c727da405912958f7f05e5', 'Rua Monsenhor Tanaka, 205', '4432228645', '44998505518', NULL, 2147483647, '000000', '1986-09-23', '2023-03-31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` text DEFAULT NULL,
  `autor` text DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `edicao` varchar(50) DEFAULT NULL,
  `editora` varchar(50) DEFAULT NULL,
  `ano_publicacao` date DEFAULT NULL,
  `qtd_paginas` int(11) DEFAULT NULL,
  `genero` enum('poesia','soneto','romance','fábula','novela','cronica','conto','ensaio','biografia','chicklit','fantasia','distopia','ficcao cientifica','horror','fantastica','infanto juvenil','young adult','suspense','autoajuda','negocios','tecnologia','hq','aventura') DEFAULT NULL,
  `idioma` varchar(50) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `disponivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bkz_clientes`
--
ALTER TABLE `bkz_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `bkz_user`
--
ALTER TABLE `bkz_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bkz_clientes`
--
ALTER TABLE `bkz_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `bkz_user`
--
ALTER TABLE `bkz_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Banco de dados: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
