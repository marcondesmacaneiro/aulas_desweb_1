<?php

    $conn = mysqli_connect('localhost', 'root', 'root', 'financas');
    if (mysqli_connect_error()) {
        echo 'erro: ' . mysql_connect_error();
        die();
    }

?>