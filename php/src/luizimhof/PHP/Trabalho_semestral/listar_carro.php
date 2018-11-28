<?php
    include 'conexao.php';

    $query = "select * from carro";
    $result = mysqli_query($conn, $query);
    
?>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Placa</td>
        <td>Saldo</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Ações</td>
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?=$linha["id"]?></td>
            <td><?=$linha["placa"]?></td>
            <td><?=$linha["saldo"]?></td>
            <td><?=$linha["cidade"]?></td>
            <td><?=$linha["estado"]?></td>
            <td>
                <a href = "deletar_carro.php?id=<?=$linha["id"]?>">Remover</a>
                <br>
                <a href = "atualizar_carro.php?id=<?=$linha["id"]?>">Atualizar</a>

            </td>
        </tr>
        <?php
        }
    ?>
</table>
<br><br><br>
<a href="cadastro_carro.php">Adicionar um cadastro de carro</a>
<hr>

