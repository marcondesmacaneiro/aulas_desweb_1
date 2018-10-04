<?php
$conn = mysqli_connect('localhost', 'root', '', 'web1');
if (mysqli_connect_errno()) {
    echo 'erro: ' . mysql_connect_error();
    die();
}
$query = "select * from pessoa";
$result = mysqli_query($conn, $query);
while ($linha = mysqli_fetch_array($result)) {
    echo "Linha: {$linha['primeiro_nome']}<br>";
}
?>