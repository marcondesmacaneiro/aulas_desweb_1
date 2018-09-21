<?php

header('Content-Type; text/html; charset=utf-8');


$sLogin = filter_input(INPUT_POST,'login', FILTER_SANITIZE_STRING);
$sSenha = filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING);

if(isset($sLogin) && isset($sSenha)){

    if($sLogin = 'admin' && $sSenha = 'admin'){
        session_start();
        $_SESSION['login'] = $sLogin;
        header('Location: pagina_segura.php');
    }
    else{
        header('Location: index.php');
    }
}