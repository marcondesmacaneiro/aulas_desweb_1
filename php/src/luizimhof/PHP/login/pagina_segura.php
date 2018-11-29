<?php
session_start();
include "conexao.php";
$login = $_POST['login'];
$senha = $_POST['senha'];
$result = mysqli_query("SELECT * FROM `USUARIO` 
    WHERE `login` = '$login' AND `senha`= '$senha'");

if(isset($result)) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
    }
    echo "<h1>Bem vindo!</h1>";
    
    echo $_SESSION['login'];
}
else{
    header('Location: index.php');
}
