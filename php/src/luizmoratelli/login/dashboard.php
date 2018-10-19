<?php 
    session_start();
    if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
        if ($_SESSION['user'] != 'Admin' || $_SESSION['pass'] != 'pass') {
            echo "Senha ou usuário incorretos";
            echo "<a href='logar.php'>Voltar</a>";
        }
    } else {
        header('location: logar.php');
    }


    echo "Dashboard";
    echo "<a href='logout.php'>Deslogar</a>";