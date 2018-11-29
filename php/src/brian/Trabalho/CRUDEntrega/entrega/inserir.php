<?php

require_once '../config/autoload.php';

$sTipo = filter_input(INPUT_POST, 'entrega', FILTER_SANITIZE_STRING);

$oEntrega = new Entrega();
$oEntrega->setTipo($sTipo);

if($oEntrega->inserir()){
    $oMensagem = new Mensagens();
    $sMensagem = $oMensagem->mensagemInclusao();
    include ("exibicao.php");
}
