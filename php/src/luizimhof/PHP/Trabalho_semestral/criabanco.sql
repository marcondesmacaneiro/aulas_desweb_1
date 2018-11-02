CREATE TABLE `PESSOA` (
  `id` int(10) UNSIGNED NOT NULL,
  `primeiro_nome` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `segundo_nome` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `tipo` int(10) NOT NULL, /* MOTORISTA OU DONO OD CARRO*/
   `cpf` int(11) NOT NULL,
   `carro_id` INT(10) UNSIGNED NOT NULL,
   `motorista_carro` int(10) UNSIGNED NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `PESSOA`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `PESSOA`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `USUARIO` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci,
  `senha` varchar(100) COLLATE utf8mb4_unicode_ci

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `USUARIO`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `USUARIO`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `CARRO`(
  `id` int(10) UNSIGNED NOT NULL,
  `marca` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `modelo` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `cor` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `cidade` varchar(50) COLLATE utf8mb4_unicode_ci ,
  `estado` varchar(2) COLLATE utf8mb4_unicode_ci ,
  `placa` varchar(7) COLLATE utf8mb4_unicode_ci,
  `dono_id` int(10) UNSIGNED NOT null 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `CARRO`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `CARRO`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `VAGA`(
    `id` int(10) UNSIGNED NOT NULL,
    `carro` int(10) UNSIGNED NOT NULL,
    `entrada` DATE NOT NULL, 
    `saida` DATE
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `VAGA`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `VAGA`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

CREATE TABLE `MOTORISTA_CARRO`(
    `id` int(10) UNSIGNED NOT NULL,
    `pessoa` int(10) UNSIGNED NOT NULL,
    `carro` int(10) UNSIGNED NOT NULL

)
ALTER TABLE `MOTORISTA_CARRO`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `MOTORISTA_CARRO`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

