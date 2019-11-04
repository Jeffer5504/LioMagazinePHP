-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12-Out-2019 às 01:10
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `liomagazine`
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `cliente`, `email`, `telefone`) VALUES
(1, 'Guilherme Caires', 'gcaires@gmail.com', '7198151552'),
(2, 'Jefferson Eloy', 'jeffeloy@gmail.com', '71987654321'),
(3, 'Joanderson Cabelinho', 'cabelinho@gmail.com', '71123456789'),
(4, 'Celso', 'celso@gmail.com', '71999999999');

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
  `subtotal` float NOT NULL,
  `data` varchar(10) NOT NULL,
  PRIMARY KEY (`idProduto`),
  UNIQUE KEY `produto` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `descricao`, `preco`, `quantidade`, `desconto`, `subtotal`, `data`) VALUES
(1, 'Fone', 'Fone de ouvido intra- auricular muito bom e resistente.', 30, 5, 5, 28.5, '08/10/2019'),
(3, 'Caixa de som', 'Sem descrição.', 89.99, 12, 10, 80.991, '08/10/2019'),
(4, 'Teclado Daten', 'Sem descrição.', 30, 18, 50, 15, '08/10/2019'),
(5, 'Mouse', 'Sem descrição.', 20.99, 16, 10, 18.891, '08/10/2019');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `idVenda` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `desconto` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `total` float DEFAULT NULL,
  `obs` varchar(100) NOT NULL,
  `data` varchar(10) NOT NULL,
  PRIMARY KEY (`idVenda`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `idCliente`, `idProduto`, `desconto`, `quantidade`, `subtotal`, `total`, `obs`, `data`) VALUES
(1, 1, 1, 5, 2, 56, 53.2, 'O Cliente pediu para que o produto fosse embalado para presente.', '08/10/2019'),
(2, 2, 3, 0, 1, 80, 80, 'Sem observações.', '08/10/2019'),
(3, 3, 3, 0, 2, 160, 160, 'Sem observações.', '08/10/2019'),
(4, 3, 1, 5, 3, 84, 79.8, 'Sem observações.', '08/10/2019'),
(5, 4, 5, 5, 3, 54, 51.3, 'Sem observações.', '01/10/2019'),
(6, 2, 5, 0, 1, 18, 18, 'Sem observações.', '08/10/2019'),
(7, 2, 4, 0, 2, 30, 30, 'Sem observações.', '08/10/2019');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
