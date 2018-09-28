<?php
    $conn = mysqli_connect('mylsq', 'root', 'root', 'web1');
    if (mysqli_connect_erro()) {
    echo 'erro: '.mysql_connect_error();
    die();
    }

    $query="select * from pessoas";
    $result = mysqli_query($conn, $query);
    while($linha = mysql_fetch_array($result)){
        echo"Linha: {$linha[primeiro_nome]}<br>";
    }
?>