<?php
       
       include "conexao.php";
       $query= "SELECT * FROM pessoa";
        $result= mysqli_query($conecta, $query);
        
?>
<a href="cadastro.php">cadastro</a>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Primeiro nome</td>
        <td>Segundo nome</td>
        <td>E-mail</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Ações</td>
    </tr>
    <?php
        while ($linha= mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td><?=$linha["id"]?></td>
                    <td><?=$linha["primeiro_nome"]?></td>
                    <td><?=$linha["segundo_nome"]?></td>
                    <td><?=$linha["email"]?></td>
                    <td><?=$linha["cidade"]?></td>
                    <td><?=$linha["estado"]?></td>
                    <td>
                        <a href="remover_detalhes.php?id=<?=$linha["id"]?>">Remover</a>
                        <br>
                        <a href="atualizar_form.php?id=<?=$linha["id"]?>">Atualizar</a>
                    </td>
                </tr>

            <?php
            
        }
    ?>
</table>


<!--
    BAnco de dados para criação 

    CREATE TABLE `pessoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `primeiro_nome` varchar(100) COLLATE utf8mb4_unicode_ci,
  `segundo_nome` varchar(100) COLLATE utf8mb4_unicode_ci,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci,
  `cidade` varchar(50) COLLATE utf8mb4_unicode_ci,
  `estado` varchar(2) COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
  ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);
  ALTER TABLE `pessoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

-->