<?php

$conn = mysqli_connect('mysql', 'root','root','web1');
if (mysqli_connect_error()) {
        echo 'erro: ' . mysql_connect_error();
        die();
    }

    $query = "select * from pessoa";
    $result = mysqli_query($conn, $query);
    while ($linha = mysqli_fetch_array($result)) {
        echo "linha: {$linha[primeiro_nome]}<br>";
        flush();
        sleep(2);
    }