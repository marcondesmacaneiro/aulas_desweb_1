<?php
session_start();
$login_cookie = $_COOKIE['login'];
if(isset($login_cookie)) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
    }
    echo "<h1>Bem vindo!</h1>"; 
    echo "Para sair pressione ";
    echo "<a href=\"?logout=true\">Logout!</a>";
    setcookie("login", null);
}
else{
    header('Location: index.php');
}
