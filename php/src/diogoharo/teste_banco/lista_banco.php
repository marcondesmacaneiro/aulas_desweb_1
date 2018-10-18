<?php 
    require "../conexao.php";

    $sSql = "SELECT * FROM pessoa";
    $sQuery = mysqli_query($conn,$sSql);

   
?>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Primeiro Nome</th>
            <th>Segundo Nome</th>
            <th>E-Mail</th>
            <th>Cidade</th>
            <th>Estado</th>
        </thead>
        <tbody>
            <?php
             while($linha= mysqli_fetch_array($sQuery)) {
                ?>
            <tr>
                <td><?=$linha['id']?></td>
                <td><?=$linha['primeiro_nome']?></td>
                <td><?=$linha['segundo_nome']?></td>
                <td><?=$linha['email']?></td>
                <td><?=$linha['cidade']?></td>
                <td><?=$linha['estado']?></td>
                
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>