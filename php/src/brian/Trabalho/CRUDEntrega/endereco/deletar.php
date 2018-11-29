<?php

require_once '../config/autoload.php';
header('Content-Type: text/html; charset=utf-8');

$oEndereco = new Endereco();

if(isset($_POST['checkbox'])){
    foreach($_POST['checkbox'] as $sDelete){
        $oEndereco->setCodigo($sDelete);
        $oEndereco->deletar();
    }
}

$oMensagem = new Mensagens();
$sMensagem = $oMensagem->mensagemRemocao();
include 'exibicao.php';

