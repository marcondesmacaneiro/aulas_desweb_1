<?php

    $conn = mysqli_connect ('mysql', 'root',  'root', 'web1');
    if(mysqli_connect_error()){
        echo 'erro: '.mysqli_connect_error();
        die();
    }


    $query = 'SELECT * FROM pessoa';
    $result = mysqli_query($conn, $query);

    while($linha = mysqli_fetch_array($result)){
        echo $linha{primeiro_nome}.' ';
        echo $linha{segundo_nome}.'<br>';
    }


?>


