
CREATE DATABASE banquitomeu;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




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


INSERT INTO `aluno` (`Cod_Aluno`, `Nome`, `Email`, `RG`, `Modulo`, `Habilitacao`, `Nome_Escola`, `senha`, `Fk_Inscricao`) VALUES
(1, 'nome 1', 'nome1@email.com', '123456789', '2', 'i', 'Etec Jorge Street', 'MTIzNA==', 5),
(2, 'nome 2', 'nome2@email.com', '123456789', '3', 'm', 'Etec Jorge Street', 'MTIzNA==', 6),
(3, 'nome 3', 'nome3@email.com', '123456789', '2', 'e', 'Etec Jorge Street', 'MTIzNA==', 7),
(4, 'nome3', 'nomee3@email.com', '123456789', '2', 'e', 'Etec Jorge Street', 'MTIzNA==', 7),
(5, 'Nome3', 'noome3@email.com', '123456789', '2', 'e', 'Etec Jorge Street', 'MTIzNA==', 7);



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



CREATE TABLE `coordenador` (
  `user` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `registerdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `coordenador` (`user`, `username`, `email`, `password`, `registerdate`) VALUES
(1, 'coordenador', 'coordenador', 'MTIzNA==', '2018-11-21 19:15:18');



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


INSERT INTO `feira` (`avaliador`, `nprojeto`, `inovacao`, `aplicabilidade`, `construcao`, `funcionabilidade`, `apresentacao`, `vestimentas`, `postura`, `decoracao`) VALUES
('professor', 1, 10, 10, 10, 10, 10, 10, 10, 10),
('professor', 2, 10, 10, 10, 10, 10, 10, 10, 10),
('professor', 3, 10, 10, 10, 10, 10, 10, 10, 10),
('professor', 4, 10, 1, 10, 1, 1, 1, 1, 1);



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



INSERT INTO `inscricao` (`Cod_Inscricao`, `Titulo`, `Prof_Resp`, `Email_Prof`, `Descricao`, `Patrocinadores`, `Alimentacao`, `Local`, `Necessidade_Esp`) VALUES
(5, 'projeto 1', 'prof', 'prof@email.com', 'projeto 1', '', '127', 'quadra', 'Ponto de ar comprimido'),
(6, 'projeto 2', 'prof', 'prof@email.com', 'projeto 2', '', '220', 'quadra', 'Ponto de ar comprimido'),
(7, 'projeto 3', 'prof', 'prof@email.com', 'projeto 3', '', '127', 'patio', 'Ponto de água corrente');


CREATE TABLE `professores` (
  `user` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `registerdate` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `professores` (`user`, `username`, `email`, `password`, `registerdate`) VALUES
(1, 'professor', 'professor', 'MTIzNA==', '2018-11-21 19:14:50');

ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Cod_Aluno`),
  ADD KEY `Fk_Inscricao` (`Fk_Inscricao`);


ALTER TABLE `coordenador`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`Cod_Inscricao`);

ALTER TABLE `professores`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `aluno`
  MODIFY `Cod_Aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `inscricao`
  MODIFY `Cod_Inscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `professores`
  MODIFY `user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`Fk_Inscricao`) REFERENCES `inscricao` (`Cod_Inscricao`);
COMMIT;

