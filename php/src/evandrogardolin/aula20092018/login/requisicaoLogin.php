<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$sLogin = $_POST['login'];
$sSenha = $_POST['senha'];

if($sLogin === "evandro" && $sSenha === "123"){
    if($aResultado){

        header('Location: pagina_segura.php');
    }else{
        header('Location: index.php');
    }    
}