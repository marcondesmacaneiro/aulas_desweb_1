<?php 
$conn = mysqli_connect('localhost', 'root', '', 'web1');

if (mysqli_connect_error()) {
    echo 'Error: '.mysqli_connect_error(); 
    die();
}