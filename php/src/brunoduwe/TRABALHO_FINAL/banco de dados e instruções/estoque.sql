SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `estoque2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estoque2`;

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `CATEGORIAID` int(5) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `DESCRICAO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categoria` (`CATEGORIAID`, `NOME`, `DESCRICAO`) VALUES
(1, 'Jogos EletrÃ´nicos', 'Nesta categoria estÃ£o presentes todos os tipos de jogos \r\neletrÃ´nicos, independente de plataforma ou gÃªnero.'),
(3, 'Jogos', 'Nesta categoria se enquadram todos tipos de jogos que nÃ£o \r\nsejam eletrÃ´nicos, ou seja, qualquer outro tipo de jogo.'),
(4, 'Filmes em DVD', 'Nesta categoria estÃ£o englobados todos os filmes \r\nindependente da tecnologia utilizada e \r\ndo gÃªnero do filme.');

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `CLIENTEID` int(5) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `TELEFONE` varchar(15) DEFAULT NULL,
  `PAIS` varchar(20) NOT NULL,
  `ESTADO` varchar(20) NOT NULL,
  `CIDADE` varchar(50) NOT NULL,
  `BAIRRO` varchar(50) NOT NULL,
  `RUA` varchar(50) NOT NULL,
  `COMPLEMENTO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cliente` (`CLIENTEID`, `NOME`, `TELEFONE`, `PAIS`, `ESTADO`, `CIDADE`, `BAIRRO`, `RUA`, `COMPLEMENTO`) VALUES
(1, 'Bruno Henrique Duwe', '(47) 98872-9396', 'Brasil', 'Santa Catarina', 'Rio do sul', 'Boa Vista', 'Beco Minas Gerais, 262', 'Casa Verde'),
(2, 'Larissa Correia da Rosa', '(47) 98827-7297', 'Brasil', 'Santa Catarina', 'Rio do sul', 'Boa Vista', 'Beco Minas Gerais, 262', 'Casa Verde'),
(3, 'JosÃ© da Silva', '(11) 99996-5414', 'Brasil', 'SÃ£o Paulo', 'SÃ£o Paulo', 'Centro', '25 de MarÃ§o, 226', 'Loja NÂº 4');

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `PRODUTOID` int(5) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `DESCRICAO` varchar(200) NOT NULL,
  `QUANTIDADE` int(20) NOT NULL,
  `VALOR` double NOT NULL,
  `CATEGORIAID` int(5) NOT NULL,
  `CLIENTEID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `produto` (`PRODUTOID`, `NOME`, `DESCRICAO`, `QUANTIDADE`, `VALOR`, `CATEGORIAID`, `CLIENTEID`) VALUES
(1, 'Battlefield V PS4', 'Jogo para o console playstation 4 onde Ã© um jogo de guerra, ambientado na segunda \r\nguerra mundial.', 1, 200, 1, 1),
(2, 'Battlefield 4 PC', 'Battlefield 4 PC, com todas as expansÃµes e premium por um ano.', 2, 207.09, 1, 2),
(4, 'Baralho de Cartas RPG', 'Este baralho contem cartas com desafios, recompensas e desfechos para jogos RPG de \r\nmesa.', 6, 12.5, 3, 1),
(5, 'Call Of Duty 4 Modern Warfare XBOX ONE', 'Jogo de tiro em primeira pessoa que se passa em uma guerra fictÃ­cia atual.', 2, 154.57, 1, 2);

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `USUARIOID` int(5) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `USUARIO` varchar(100) NOT NULL,
  `SENHA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`USUARIOID`, `NOME`, `USUARIO`, `SENHA`) VALUES
(1, 'Bruno Henrique Duwe', 'brunoduwe', '832ae80fd1eca13803802c576484c4cf'),
(3, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3');


ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CATEGORIAID`);

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`CLIENTEID`);

ALTER TABLE `produto`
  ADD PRIMARY KEY (`PRODUTOID`),
  ADD KEY `categoria_produto_fk` (`CATEGORIAID`),
  ADD KEY `cliente_produto_fk` (`CLIENTEID`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USUARIOID`);


ALTER TABLE `categoria`
  MODIFY `CATEGORIAID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `cliente`
  MODIFY `CLIENTEID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `produto`
  MODIFY `PRODUTOID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `usuario`
  MODIFY `USUARIOID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `produto`
  ADD CONSTRAINT `categoria_produto_fk` FOREIGN KEY (`CATEGORIAID`) REFERENCES `categoria` (`CATEGORIAID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cliente_produto_fk` FOREIGN KEY (`CLIENTEID`) REFERENCES `cliente` (`CLIENTEID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
