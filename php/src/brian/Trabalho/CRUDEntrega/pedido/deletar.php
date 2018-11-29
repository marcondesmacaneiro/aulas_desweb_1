<?php

require_once '../config/autoload.php';
header('Content-Type: text/html; charset=utf-8');

$oPedido = new Pedido();

if(isset($_POST['checkbox'])){
    foreach($_POST['checkbox'] as $sDelete){
        $oPedido->setCodigo($sDelete);
        $oPedido->deletar();
    }
}

$oMensagem = new Mensagens();
$sMensagem = $oMensagem->mensagemRemocao();
include 'exibicao.php';

