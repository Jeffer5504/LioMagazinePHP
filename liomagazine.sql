-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: 08-Nov-2019 às 15:44
=======
-- Generation Time: 08-Nov-2019 às 15:13
>>>>>>> master
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liomagazine`
--
CREATE DATABASE IF NOT EXISTS `liomagazine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `liomagazine`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE KEY `email` (`email`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
>>>>>>> master

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `cliente`, `email`, `telefone`) VALUES
<<<<<<< HEAD
(6, 'Jefferson', 'jeff@gmail.com', '71992346875'),
(7, 'Teste', 'teste@gmail.com', '71986234568');
=======
(1, 'Guilherme Caires', 'gcaires@gmail.com', '71 9 8515-1552'),
(2, 'Jefferson Eloy', 'jeff@gmail.com', '71 9 9999-9999');
>>>>>>> master

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_adm`
--

DROP TABLE IF EXISTS `login_adm`;
CREATE TABLE IF NOT EXISTS `login_adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_adm`
--

INSERT INTO `login_adm` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` float NOT NULL,
  `datap` varchar(10) NOT NULL,
  PRIMARY KEY (`idProduto`),
  UNIQUE KEY `produto` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `descricao`, `preco`, `quantidade`, `desconto`, `datap`) VALUES
(1, 'Fone', 'Fone de ouvido JBL.', 34.99, 20, 10, '2019-11-08'),
(2, 'Mouse', '', 15, 40, 0, '2019-11-08'),
(3, 'Teclado', '', 50, 38, 0, '2019-11-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `idVenda` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `total` float DEFAULT NULL,
  `obs` varchar(100) NOT NULL,
  `datav` varchar(10) NOT NULL,
  PRIMARY KEY (`idVenda`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `idCliente`, `idProduto`, `desconto`, `quantidade`, `subtotal`, `total`, `obs`, `datav`) VALUES
(1, 1, 1, 0, 0, 3, 0, 'O cliente pediu para embalar para presente.', '2019-11-08');
>>>>>>> master
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
