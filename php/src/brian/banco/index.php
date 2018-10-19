<?php

    require('conexao.php');

    $query = "select * from pessoa";
    $result = mysqli_query($conn, $query);
?>
<a href="cadastro.php">Cadastrar</a>
<br>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Primeiro Nome</td>
        <td>Segundo Nome</td>
        <td>E-mail</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Ações</td>
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
                    <a href="remover_detalhes.php?id=<?=$linha[id]?>">Remover</a>
                    <br>
                    <a href="atualizar_form.php?id=<?=$linha["id"]?>">Atualizar</a>
                </td>
              </tr>
    <?php
                 }
        
    ?>
</table>