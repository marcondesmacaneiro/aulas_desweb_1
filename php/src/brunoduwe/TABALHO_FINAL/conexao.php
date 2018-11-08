<?php
$conn = mysqli_connect('localhost', 'root', '', 'estoque');
if (mysqli_connect_errno()) {
    echo 'erro: ' . mysql_connect_error();
    die();
}
?>