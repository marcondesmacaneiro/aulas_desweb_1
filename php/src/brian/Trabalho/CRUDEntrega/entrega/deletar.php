<?php

require_once '../config/autoload.php';
header('Content-Type: text/html; charset=utf-8');

$oEntrega = new Entrega();

if(isset($_POST['checkbox'])){
    foreach($_POST['checkbox'] as $sDelete){
        $oEntrega->setCodigo($sDelete);
        $oEntrega->deletar();
    }
}

$oMensagem = new Mensagens();
$sMensagem = $oMensagem->mensagemRemocao();
include 'exibicao.php';

