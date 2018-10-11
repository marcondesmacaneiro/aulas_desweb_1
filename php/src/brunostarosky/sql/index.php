<?php
    $conn = mysqli_connect('mysql','root','root','web1');
    if (mysqli_connect_error()){
        echo 'erro: ' .mysqli_connect_error();
        die();
    }

    $query = "select * from pessoa";
    $result = mysqli_query ($conn, $query);
    while ($linha = mysqli_fetch_array($result)){
        echo "Linha: {$linha [primeiro_nome]} <br/>";
        flush(); //carregar e depois mandar para o navegador
        //sleep(); demorar tantos segundos para carregar a pagina 
    }