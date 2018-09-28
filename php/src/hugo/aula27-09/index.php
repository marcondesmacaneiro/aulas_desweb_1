<?php
    $conecta=mysqli_connect('mysql', 'root', 'root', 'web1');
    if (mysqli_connect_error()){
        echo 'erro: '.mysqli_connect_error();
        die();
    }
    $query= "SELECT * FROM pessoa";
    $result= mysqli_query($conecta, $query);
    while ($linha= mysqli_fetch_array($result)){
        echo "Linha: {$linha[primeiro_nome]} <br>";
        flush();
        sleep(5);
    }
?>