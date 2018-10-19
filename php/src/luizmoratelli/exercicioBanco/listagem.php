<?php 
require_once('conexao.php');

$sql = "SELECT *
          FROM pessoa";
$query = mysqli_query($conn, $sql);
?>
<a href="cadastro.php">cadastro</a>
<hr>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Primeiro Nome</th>
        <th>Segundo Nome</th>
        <th>E-mail</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Ações</th>
    </tr>
<?php 
    while ($row = mysqli_fetch_array($query)):
    ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['primeiro_nome']?></td>
            <td><?=$row['segundo_nome']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['cidade']?></td>
            <td><?=$row['estado']?></td>
            <td>
                <a href="remover_detalhes.php?id=<?=$row['id']?>">Excluir</a>
                <a href="atualizar_form.php?id=<?=$row['id']?>">Atualizar</a>
            </td>
        </tr>
    <?php
    endwhile;
?> 
</table>