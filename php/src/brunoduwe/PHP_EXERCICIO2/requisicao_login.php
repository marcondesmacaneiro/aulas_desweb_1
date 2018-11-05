<?php
session_start();
    if($_POST['login'] == 'admin' && $_POST['senha'] == 'admin'){
        $_SESSION['login'] = 'Administrador';
        header('Location: pagina_segura.php');
    }
    else{
        header('Location: index.php');
    }
?>