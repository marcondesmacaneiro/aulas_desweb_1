<?php

$conn = mysqli_connect('mysql', 'root', 'root', 'web1');
if (mysqli_connect_error()) {
    echo 'erro: ' . mysql_connect_error();
    die();
}

$query = "select * from pessoa";
$result = mysqli_query($conn, $query);
//while ($linha = mysqli_fetch_array($result)) {
//    echo "Linha: {$linha[primeiro_nome]}<br>";
//}
?>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Primeito nome</td>
        <td>Segundo nome</td>
        <td>E-Mail</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Ações</td>
    </tr>
    <?php
    while ($linha = mysqli_fetch_array($result)) {
        //echo "Linha: {$linha[primeiro_nome]}<br>";
        ?>
            <tr>
                <td><?=$linha["id"]?></td>
                <td><?=$linha["primeiro_nome"]?></td>
                <td><?=$linha["segundo_nome"]?></td>
                <td><?=$linha["email"]?></td>
                <td><?=$linha["cidade"]?></td>
                <td><?=$linha["estado"]?></td>
            </tr>
        <?php
    }
    ?>
</table>


