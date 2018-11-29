<?php

require_once '../config/autoload.php';
header('Content-Type: text/html charset=utf=8');

$oCliente = new Cliente();
$oEndereco = new Endereco();

$sCodigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_STRING);
$sNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sEndereco = filter_input(INPUT_POST, 'select_enderecos', FILTER_SANITIZE_STRING);

$oCliente->setCodigo($sCodigo);
$oCliente->setNome($sNome);
$oEndereco->setCodigo($sEndereco);
$oCliente->setEndereco($oEndereco);

if($oCliente->alterar()){
    $oMensagem = new Mensagens();
    $sMensagem = $oMensagem->mensagemAlteracao();
    include 'exibicao.php';
}



