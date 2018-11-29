<?php

require_once '../config/autoload.php';
header('Content-Type: text/html charset=utf=8');

$sCodigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
$sTipo = filter_input(INPUT_POST, 'entrega', FILTER_SANITIZE_STRING);


$oEntrega = new Entrega();
$oEntrega->setCodigo($sCodigo);
$oEntrega->setTipo($sTipo);

if($oEntrega->alterar()){
    $oMensagem = new Mensagens();
    $sMensagem = $oMensagem->mensagemAlteracao();
    include 'exibicao.php';
}



