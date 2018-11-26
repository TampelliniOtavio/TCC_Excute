-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Nov-2018 às 03:37
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banquitomeu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `Cod_Aluno` int(11) NOT NULL,
  `Nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `RG` varchar(20) COLLATE utf8_bin NOT NULL,
  `Modulo` varchar(30) COLLATE utf8_bin NOT NULL,
  `Habilitacao` varchar(100) COLLATE utf8_bin NOT NULL,
  `Nome_Escola` varchar(30) COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) COLLATE utf8_bin NOT NULL,
  `Fk_Inscricao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`Cod_Aluno`, `Nome`, `Email`, `RG`, `Modulo`, `Habilitacao`, `Nome_Escola`, `senha`, `Fk_Inscricao`) VALUES
(1, 'nome 1', 'nome1@email.com', '123456789', '2', 'i', 'Etec Jorge Street', 'MTIzNA==', 5),
(2, 'nome 2', 'nome2@email.com', '123456789', '3', 'm', 'Etec Jorge Street', 'MTIzNA==', 6),
(3, 'nome 3', 'nome3@email.com', '123456789', '2', 'e', 'Etec Jorge Street', 'MTIzNA==', 7),
(4, 'nome3', 'nomee3@email.com', '123456789', '2', 'e', 'Etec Jorge Street', 'MTIzNA==', 7),
(5, 'Nome3', 'noome3@email.com', '123456789', '2', 'e', 'Etec Jorge Street', 'MTIzNA==', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `turma` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avaliador` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome_projeto` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pertinencia_tema` int(2) NOT NULL,
  `aplicabilidade` int(2) NOT NULL,
  `construcao` int(2) NOT NULL,
  `funcionabilidade` int(2) NOT NULL,
  `dominio` int(2) NOT NULL,
  `apresentacao` int(2) NOT NULL,
  `total` int(2) NOT NULL,
  `aprovado` varchar(3) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenador`
--

CREATE TABLE `coordenador` (
  `user` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `registerdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `coordenador`
--

INSERT INTO `coordenador` (`user`, `username`, `email`, `password`, `registerdate`) VALUES
(1, 'coordenador', 'coordenador', 'MTIzNA==', '2018-11-21 19:15:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `feira`
--

CREATE TABLE `feira` (
  `avaliador` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nprojeto` int(11) NOT NULL,
  `inovacao` int(11) NOT NULL,
  `aplicabilidade` int(11) NOT NULL,
  `construcao` int(11) NOT NULL,
  `funcionabilidade` int(11) NOT NULL,
  `apresentacao` int(11) NOT NULL,
  `vestimentas` int(11) NOT NULL,
  `postura` int(11) NOT NULL,
  `decoracao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `feira`
--

INSERT INTO `feira` (`avaliador`, `nprojeto`, `inovacao`, `aplicabilidade`, `construcao`, `funcionabilidade`, `apresentacao`, `vestimentas`, `postura`, `decoracao`) VALUES
('professor', 1, 10, 10, 10, 10, 10, 10, 10, 10),
('professor', 2, 10, 10, 10, 10, 10, 10, 10, 10),
('professor', 3, 10, 10, 10, 10, 10, 10, 10, 10),
('professor', 4, 10, 1, 10, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `Cod_Inscricao` int(11) NOT NULL,
  `Titulo` varchar(40) COLLATE utf8_bin NOT NULL,
  `Prof_Resp` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Email_Prof` varchar(50) COLLATE utf8_bin NOT NULL,
  `Descricao` varchar(350) COLLATE utf8_bin NOT NULL,
  `Patrocinadores` varchar(100) COLLATE utf8_bin NOT NULL,
  `Alimentacao` varchar(400) COLLATE utf8_bin DEFAULT NULL,
  `Local` varchar(400) COLLATE utf8_bin DEFAULT NULL,
  `Necessidade_Esp` varchar(400) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `inscricao`
--

INSERT INTO `inscricao` (`Cod_Inscricao`, `Titulo`, `Prof_Resp`, `Email_Prof`, `Descricao`, `Patrocinadores`, `Alimentacao`, `Local`, `Necessidade_Esp`) VALUES
(5, 'projeto 1', 'prof', 'prof@email.com', 'projeto 1', '', '127', 'quadra', 'Ponto de ar comprimido'),
(6, 'projeto 2', 'prof', 'prof@email.com', 'projeto 2', '', '220', 'quadra', 'Ponto de ar comprimido'),
(7, 'projeto 3', 'prof', 'prof@email.com', 'projeto 3', '', '127', 'patio', 'Ponto de água corrente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `user` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `registerdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`user`, `username`, `email`, `password`, `registerdate`) VALUES
(1, 'professor', 'professor', 'MTIzNA==', '2018-11-21 19:14:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Cod_Aluno`),
  ADD KEY `Fk_Inscricao` (`Fk_Inscricao`);

--
-- Indexes for table `coordenador`
--
ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`Cod_Inscricao`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `Cod_Aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `Cod_Inscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`Fk_Inscricao`) REFERENCES `inscricao` (`Cod_Inscricao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
