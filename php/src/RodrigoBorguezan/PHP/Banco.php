<?php

$conn = mysqli_connect('mysql','root','root','web1');
if (mysqli_connect_error()){
    
    echo 'erro: ' . mysql_connect_error();
    die();
}

$query = "select * from pessoa order by id";
$result = mysqli_query($conn,$query);

while($linha = mysqli_fetch_array($result)){
    echo "Linha : {$linha[primeiro_nome]}<br>";
    flush();
   // sleep(3);
}