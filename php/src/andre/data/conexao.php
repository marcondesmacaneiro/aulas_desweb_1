<?php

$conn = mysqli_connect("127.0.0.1", "root", "", "web1");
    if (mysqli_connect_error()) {
        echo 'erro: '.mysql_connect_error();
        die();
    }
?>