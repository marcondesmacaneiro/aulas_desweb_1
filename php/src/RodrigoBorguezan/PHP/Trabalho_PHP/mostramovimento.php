<a href="menu.php">Tela Inicial</a>

<hr>
<?php
    include "conexao.php";

    $query1 = "select * from receita";
    $result1 = mysqli_query($conn, $query1);

    $query2 = "select * from despesa";
    $result2 = mysqli_query($conn, $query2);
       
?>

<table border="1">
    <tr>
        <tr>
            <td><b>Codigo Receita</b></td>
            <td><b>Descricao Receita</b></td>
            <td><b>Valor Receita</b></td>
        </tr>
        <?php
            while ($linha = mysqli_fetch_array($result1)) {
                ?>
                    <tr>
                        <td><?=$linha["idreceita"]?></td>
                        <td><?=$linha["descricao"]?></td>
                        <td><?=$linha["valor"]?></td>
                    </tr>
                <?php
            }
        ?>
    </tr>

    <tr>
        <tr>
            <td><b>Codigo Despesa</b></td>
            <td><b>Descricao Despesa</b></td>
            <td><b>Valor Despesa</b></td>
        </tr>
        <?php
            while ($linha = mysqli_fetch_array($result2)) {
                ?>
                    <tr>
                        <td><?=$linha["iddespesa"]?></td>
                        <td><?=$linha["descricao"]?></td>
                        <td><?=$linha["valor"]?></td>
                    </tr>
                <?php
            }
        ?>
    </tr>
</table>
