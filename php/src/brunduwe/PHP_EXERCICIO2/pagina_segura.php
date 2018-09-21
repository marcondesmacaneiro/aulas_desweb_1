<?php
session_start();
if(isset($_SESSION['login'])) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
    }
    echo "<h1>Bem vindo!</h1>";
    echo "<a href=\"?logout=true\">Logout!</a>";
    echo $_SESSION['login'];
}
else{
    header('Location: index.php');
}
