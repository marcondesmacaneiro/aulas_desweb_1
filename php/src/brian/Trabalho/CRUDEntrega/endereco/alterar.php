<?php

require_once '../config/autoload.php';
header('Content-Type: text/html charset=utf=8');

$sCodigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
$sEndereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$sTipo = filter_input(INPUT_POST, 'endtipo', FILTER_SANITIZE_STRING);

$oEndereco = new Endereco();
$oEndereco->setCodigo($sCodigo);
$oEndereco->setTipo($sTipo);
$oEndereco->setDescricao($sEndereco);

if($oEndereco->alterar()){
    $oMensagem = new Mensagens();
    $sMensagem = $oMensagem->mensagemAlteracao();
    include 'exibicao.php';
}



