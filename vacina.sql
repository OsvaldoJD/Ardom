-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2018 às 19:52
-- Versão do servidor: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacina`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dose`
--

CREATE TABLE `dose` (
  `idDose` int(11) NOT NULL,
  `dose` int(11) NOT NULL,
  `dataCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(150) NOT NULL,
  `direcao` varchar(255) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `data_cadastro` date NOT NULL,
  `logo_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `direcao`, `cidade`, `estado`, `telefone`, `email`, `data_cadastro`, `logo_url`) VALUES
(1, 'ArdomSoft', 'Angola', 'Luanda', 'Viana', '934544000', 'jjj@teste.com', '2018-10-01', 'd17d66b6c4cc390ff9e43f71be30cf9d.jpg'),
(2, 'AngoPromo', 'Angola', 'Luanda', 'Icolo Bengo', '934544000', 'jjj@teste.com', '2018-10-21', 'd17d66b6c4cc390ff9e43f71be30cf9d.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospital`
--

CREATE TABLE `hospital` (
  `idHospital` int(11) NOT NULL,
  `nomeHospital` varchar(30) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `dataCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `pai` varchar(30) NOT NULL,
  `mae` varchar(30) NOT NULL,
  `dataNascimento` date NOT NULL,
  `telefone` varchar(35) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `data_cadastro` date NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `nome`, `pai`, `mae`, `dataNascimento`, `telefone`, `provincia`, `municipio`, `bairro`, `data_cadastro`, `photo`) VALUES
(1, 'Joao', 'Maria', '', '0000-00-00', '', 'Luannda', 'Viana', 'Vila Nova', '2018-11-17', '733b87c6f000df3ddbe151a72141ef23.PNG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipovacina`
--

CREATE TABLE `tipovacina` (
  `idTipoVacina` int(11) NOT NULL,
  `descricao` varchar(25) NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `primeiro_nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ultimo_nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `email_usuario` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `passwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `data_cadastro` datetime NOT NULL,
  `logo_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_fk_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `primeiro_nome`, `ultimo_nome`, `user_name`, `email_usuario`, `passwd`, `data_cadastro`, `logo_url`, `admin_type`, `id_fk_empresa`) VALUES
(1, 'Vado', 'K', 'vado', 'teste@teste.gmail.com', '123456', '2018-11-03 08:13:54', '9a95520b961ee5b5ef7b99a1444619ea.jpg', 'admin', 2),
(3, 'Ardom', 'Soft', 'ardom', 'teste@teste.gmail.com', '3b8ebe34e784a3593693a37baaacb016', '2018-11-03 09:21:01', '53711ece5c95ae5ce034d0a2ee6aa672.png', 'super', 2),
(4, 'Chetan', 'K', 'chetan', 'info@teste.pw', '3b8ebe34e784a3593693a37baaacb016', '2018-11-03 09:45:52', '6a853826166aea0e2b21dc29608dfda8.jpg', '', 1),
(5, 'Lucas', 'Fonseca', 'lucas', 'teste@teste.gmail.com', '2abc57ddc7651c205cddf561727d5cfe', '2018-11-03 11:54:50', '8117e36fc2d4b35acf5e30229d91868d.jpg', '', 2),
(6, 'Osvaldo', 'Dulo', 'osvaldo', 'teste@teste.com', 'ad4890a1db6ad9cc7d46771d7a0a55a0', '2018-11-04 13:45:05', '227b99a696c5f3b2aa0eb91ff71155bb.PNG', '', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacina`
--

CREATE TABLE `vacina` (
  `idVacina` int(11) NOT NULL,
  `fkVacina` int(11) NOT NULL,
  `fkDose` int(11) NOT NULL,
  `fkPessoa` int(11) NOT NULL,
  `fkhospital` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `dataCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dose`
--
ALTER TABLE `dose`
  ADD PRIMARY KEY (`idDose`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`idHospital`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`);

--
-- Indexes for table `tipovacina`
--
ALTER TABLE `tipovacina`
  ADD PRIMARY KEY (`idTipoVacina`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `vacina`
--
ALTER TABLE `vacina`
  ADD PRIMARY KEY (`idVacina`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dose`
--
ALTER TABLE `dose`
  MODIFY `idDose` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `idHospital` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipovacina`
--
ALTER TABLE `tipovacina`
  MODIFY `idTipoVacina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vacina`
--
ALTER TABLE `vacina`
  MODIFY `idVacina` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
