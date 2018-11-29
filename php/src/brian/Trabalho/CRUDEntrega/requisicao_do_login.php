<?php

require_once './config/autoload.php';

header('Content-Type: text/html; charset=utf-8');

$sLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$sSenha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if(isset($sLogin) && isset($sSenha)){
    $oLogin = new Login();
    $oLogin->setLogin($sLogin);
    $oLogin->setSenha($sSenha);
    $oVerifica = $oLogin->requisicaoLogin();
    
    if($oVerifica){
        session_start();
        $_SESSION['login'] = $sLogin;
    }else{
        $oMensagens = new Mensagens();
        echo $sMensagem = $oMensagens->mensagemLogin();
    }    
}