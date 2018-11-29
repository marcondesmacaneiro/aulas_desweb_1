delimiter $$

CREATE DATABASE `financas` /*!40100 DEFAULT CHARACTER SET latin1 */$$


delimiter $$

CREATE TABLE `despesa` (
  `iddespesa` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`iddespesa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1$$


delimiter $$

CREATE TABLE `fechamento` (
  `idfechamento` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `valor` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`idfechamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1$$


delimiter $$

CREATE TABLE `receita` (
  `idreceita` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `valor` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`idreceita`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1$$


delimiter $$

CREATE TABLE `saldo` (
  `idsaldo` int(11) NOT NULL AUTO_INCREMENT,
  `saldo` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`idsaldo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1$$


delimiter $$

CREATE TABLE `usuario` (
  `USUARIOID` int(5) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `USUARIO` varchar(100) NOT NULL,
  `SENHA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1$$


