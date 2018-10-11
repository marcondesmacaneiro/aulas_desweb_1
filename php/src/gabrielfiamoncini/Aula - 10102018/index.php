<?php

    $sql = 'select * from pessoa';
    $query = mysqli_query($conn, $sql);

    while ($linha = mysqli_fetch_array($query)) {
        echo  $linha['primeiro_nome'].'<br>';
        }
       

?>