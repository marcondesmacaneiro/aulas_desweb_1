<?php

    $conecta=mysqli_connect('mysql', 'root', 'root', 'web1');
    if (mysqli_connect_error()){
        echo 'erro: '.mysqli_connect_error();
        die();
    }

?>