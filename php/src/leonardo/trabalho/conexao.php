<?php

    $conn = mysqli_connect('mysql', 'root', 'root', 'trabalho_final');
    if (mysqli_connect_error()) {
        echo 'erro: ' . mysql_connect_error();
        die();
    }

?>