<?php

session_start();

if(isset($_SESSION['login'])){
    echo $_SESSION['login'];
}
else{
    header('Location: index.php');
}

if(isset($_GET['logout'])){
    session_destroy();
    header('Location: index.php');
}

?>

<a href="?logout">Sair</a>