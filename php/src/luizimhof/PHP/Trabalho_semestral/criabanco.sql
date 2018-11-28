CREATE TABLE `motorista` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100),
  `sobrenome` varchar(100),
  `carro_id` int(10) UNSIGNED
) ;


CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(100) ,
  `senha` varchar(100) 
) ;


CREATE TABLE `estacionamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `vagas_livres` int(10) UNSIGNED,
  `vagas_ocupadas` int(10) UNSIGNED,
  `lucro` int(20) UNSIGNED
) ;


CREATE TABLE `carro` (
  `id` int(10) UNSIGNED NOT NULL,
  `placa` varchar(7) NOT NULL UNIQUE ,
  `saldo` DECIMAL (10,2),
  `cidade` VARCHAR (40),
  `estado` VARCHAR(2),
  `vaga_id` int(10) UNSIGNED
) ;


CREATE TABLE `vaga` (
  `id` int(10) UNSIGNED NOT NULL,
  `livre` BOOLEAN ,
  `carro` int(10) ,
  `entrada` TIMESTAMP NOT NULL ,
  `saida` TIMESTAMP,
  `preco_hora` DECIMAL (10,2),
  `saldo` DECIMAL (10,2),
  `estacionamento_id` int(10) UNSIGNED
) ;


-- ALTER
-- PK
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `motorista`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `estacionamento`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `estacionamento`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

 ALTER TABLE `carro`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `carro`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;


 ALTER TABLE `vaga`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `vaga`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;




 -- FK

 ALTER TABLE `vaga`
 ADD CONSTRAINT `fk_estacionamento` FOREIGN KEY (`estacionamento_id`) REFERENCES `estacionamento` (`id`);

 ALTER TABLE `carro`
 ADD CONSTRAINT `fk_vaga` FOREIGN KEY (`vaga_id`) REFERENCES `vaga` (`id`);

 ALTER TABLE `motorista`
  ADD CONSTRAINT `fk_carro` FOREIGN KEY (`carro_id`) REFERENCES `carro` (`id`);