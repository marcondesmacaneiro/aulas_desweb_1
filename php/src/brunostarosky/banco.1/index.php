<?php

include"conexao.php";

$query = "select * from pessoa";
$result = mysqli_query ($conn, $query);

   

?>
 <table border="1">
    <tr>
        <td>id</td>
        <td>primeiro nome</td>
        <td>segundo nome</td>
        <td>E-mail</td>
        <td>cidade</td>
        <td>estado</td>
        <td>ações</td>
    </tr>


<?php
        while ($linha = mysqli_fetch_array($result)) {
      ?>  
     <tr>
        <td><?=$linha["id"]?></td>
        <td><?=$linha["primeiro_nome"]?></td>
        <td><?=$linha["segundo_nome"]?></td>
        <td><?=$linha["email"]?></td>
        <td><?=$linha["cidade"]?></td>
        <td><?=$linha["estado"]?></td>
        <td>
            <a href="remover_detalhes.php?id=<?=$linha["id"]?>">remover</a>
            <br>
            <a href="atualizar_form.php?id=<?=$linha["id"]?>">atualizar</a>

        </td>
    
    </tr>
    <?php
       
        }
?>
</table>
