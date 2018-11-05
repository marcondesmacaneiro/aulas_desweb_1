<?php
$conn = mysqli_connect('localhost', 'root', '', 'web1');
if (mysqli_connect_errno()) {
    echo 'erro: ' . mysql_connect_error();
    die();
}
?>