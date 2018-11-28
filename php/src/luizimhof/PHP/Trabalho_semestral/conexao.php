<?php

  $conn = mysqli_connect ('localhost', 'root',  '', 'estacionamento');
    if(mysqli_connect_error()){
        echo 'erro: '.mysqli_connect_error();
        die();
    }

?>
