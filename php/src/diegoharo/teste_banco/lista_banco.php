<?php 
    $conn = mysqli_connect('mysql', 'root', 'root' ,'web1');
    if(mysqli_connect_error()) {
        echo  'erro:' . mysqli_connect_error();
        die();
    }

    $sSql = "SELECT * FROM pessoa";
    $sQuery = mysqli_query($conn,$sSql);

    while($linha= mysqli_fetch_array($sQuery)) {
        echo $linha[primeiro_nome] . '<br/>';
    }