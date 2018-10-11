<?php

include "conexao.php";

$query = "select * from pessoa";
$result = mysqli_query($conn, $query);
while ($linha = mysqli_fetch_array($result)) {
    echo "Linha: {$linha[primeiro_nome]}<br>";
}
