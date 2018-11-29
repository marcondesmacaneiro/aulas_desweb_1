<a href="menu.php">Tela Inicial</a>

<hr>
<?php
    include "conexao.php";

    $query1 = "select ((sum(valor))-(select sum(valor) from despesa)) as saldo from receita";
    $result1 = mysqli_query($conn, $query1);
?>

<table border="1">
    <tr>
        <tr>
            <td><b>Saldo </b></td>
        </tr>
        <?php
            while ($linha = mysqli_fetch_array($result1)) {
                ?>
                    <tr>
                        <td><?=$linha["saldo"]?></td>
                    </tr>
                <?php
            }
        ?>
    </tr>
</table>
