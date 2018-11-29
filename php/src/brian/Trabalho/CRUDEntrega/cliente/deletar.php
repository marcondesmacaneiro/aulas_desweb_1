<?php

require_once '../config/autoload.php';
header('Content-Type: text/html; charset=utf-8');

$oCliente = new Cliente();

if(isset($_POST['checkbox'])){
    foreach($_POST['checkbox'] as $sDelete){
        $oCliente->setCodigo($sDelete);
        $oCliente->deletar();
    }
}

$oMensagem = new Mensagens();
$sMensagem = $oMensagem->mensagemRemocao();
include 'exibicao.php';

