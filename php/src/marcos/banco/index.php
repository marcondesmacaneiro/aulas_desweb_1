<?php

$

$query = "select * from pessoa";
$result = mysqli_query ($conn, $query);
while ($linha = mysqli_fetch_array($result)) {
    echo "linha: {$linha [primeiro_nome]} <br>";
    flush ();
    sleep (5);
}
?>
