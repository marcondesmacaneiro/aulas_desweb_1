<?php
       
       include "conexao.php";
       $query= "SELECT * FROM pessoa";
        $result= mysqli_query($conecta, $query);
        
?>
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
                    <td>Ações</td>
                </tr>

            <?php
            
        }
    ?>
</table>