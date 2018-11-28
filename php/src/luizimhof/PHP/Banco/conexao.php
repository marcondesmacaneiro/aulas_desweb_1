<?php

  $conn = mysqli_connect ('localhost', 'root',  '', 'web1');
    if(mysqli_connect_error()){
        echo 'erro: '.mysqli_connect_error();
        die();
    }

?>
