<?php
session_start();
if(isset($_SESSION['login'])) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
    }
    echo "<h1>Bem vindo!</h1>"; 
    echo $_SESSION['login'];
    echo ", para sair pressione ";
    echo "<a href=\"?logout=true\">Logout!</a>";
}
else{
    header('Location: index.php');
}
