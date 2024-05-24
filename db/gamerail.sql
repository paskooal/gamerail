-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24/05/2024 às 10:14
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gamerail`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `nomeUser` varchar(45) NOT NULL,
  `senhaUser` varchar(45) NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`idUser`, `nomeUser`, `senhaUser`, `dataNasc`, `email`) VALUES
(1, 'Larissa', '12345', '2004-04-04', 'larissa@gmail.com'),
(2, '1', '1', '2001-01-01', '1@gmail.com'),
(3, 'Enzo Bozó', '123', '2024-05-06', 'enzobozo@gmail.com'),
(4, 'Demontier', 'yarlla123', '2008-10-16', 'demontier.lima@aluno.ce.gov.br'),
(5, 'Cueca Suja', '1233333', '2024-05-22', 'Cuecamolhada@gmail.com'),
(6, '1', '1', '2024-05-01', '1@gmail.com'),
(7, '2', '2', '2024-05-02', '2@gmail.com'),
(8, '2', '2', '2024-05-02', '2@gmail.com'),
(9, '2', '2', '2024-05-02', '2@gmail.com'),
(10, '2', '2', '2024-05-02', '2@gmail.com'),
(11, '2', '2', '2024-05-02', '2@gmail.com'),
(12, '2', '2', '2024-05-02', '2@gmail.com'),
(13, '2', '2', '2024-05-02', '2@gmail.com'),
(14, '2', '2', '2024-05-02', '2@gmail.com'),
(15, '2', '2', '2024-05-02', '2@gmail.com'),
(16, '2', '2', '2024-05-02', '2@gmail.com'),
(17, '2', '2', '2024-05-02', '2@gmail.com'),
(18, 'paskooal', 'mpascoal123', '2024-05-23', 'catetos10@gmail.com'),
(19, 'Tonico', 'd4rkbread', '2024-05-23', 'marcos.sousa221@aluno.ce.gov.br'),
(20, 'Tonico', 'd4rkbread', '2024-05-23', 'marcos.sousa221@aluno.ce.gov.br');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
