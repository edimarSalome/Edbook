-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `edbook`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) NOT NULL,
  `comentario` text NOT NULL,
  `data` date NOT NULL,
  `stars` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `idUsuario`, `comentario`, `data`, `stars`) VALUES
(1, 1, 'O dólar subiu!', '2015-10-01', 0),
(2, 1, 'Edbook vai bombar!', '2015-10-01', 0),
(3, 1, 'O laboratório fica sempre fechado', '2015-10-01', 0),
(4, 1, 'Segunda é feriado!', '2015-10-01', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `replica`
--

CREATE TABLE IF NOT EXISTS `replica` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idComentario` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `replica`
--

INSERT INTO `replica` (`id`, `idComentario`, `idUsuario`, `data`) VALUES
(1, 1, 2, '2015-10-01'),
(2, 1, 3, '2015-10-14'),
(3, 2, 5, '2015-10-15'),
(4, 2, 1, '2015-10-29'),
(5, 2, 6, '2015-10-12'),
(6, 3, 7, '2015-10-29'),
(7, 4, 1, '2015-10-29'),
(8, 4, 3, '2015-10-29'),
(9, 4, 6, '2015-10-29'),
(10, 4, 5, '2015-10-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `usuario`, `senha`, `foto`) VALUES
(1, 'Edimar Jr.', 'edimarjunior@outlook.com', 'EdimarJr', '1234', 'sir.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioamigos`
--

CREATE TABLE IF NOT EXISTS `usuarioamigos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) NOT NULL,
  `idAmigo` int(10) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
