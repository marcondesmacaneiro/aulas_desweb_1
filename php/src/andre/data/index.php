<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "web1");
    if (mysqli_connect_error()) {
        echo 'erro: '.mysql_connect_error();
        die();
    }

    $sql = 'select * from pessoa';
    $query = mysqli_query($conn, $sql);

    while ($linha = mysqli_fetch_array($query)) {
        echo $linha['primeiro_nome'].'<br>';
        }
            

?>