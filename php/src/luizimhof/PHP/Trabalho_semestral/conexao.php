<?php

  $conn = mysqli_connect ('mysql', 'root',  'root', 'estacionamento');
    if(mysqli_connect_error()){
        echo 'erro: '.mysqli_connect_error();
        die();
    }

?>
