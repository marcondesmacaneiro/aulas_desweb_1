<?php
session_start();
if (isset($_POST['acao'])) {
    if ($_POST['acao'] = 'logar') {
        if (isset($_POST['user']) && isset($_POST['pass'])) {
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['pass'] = $_POST['pass'];
        }
    }
}
header('location: index.php');