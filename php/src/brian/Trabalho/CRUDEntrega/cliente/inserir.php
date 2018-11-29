<?php

header('Content-Type: text/html charset=utf-8');
require_once '../config/autoload.php';

$sNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$sEndereco = filter_input(INPUT_POST, 'select_enderecos', FILTER_SANITIZE_STRING);

$oCliente = new Cliente();
$oEndereco = new Endereco();
$oCliente->setNome($sNome);
$oEndereco->setCodigo($sEndereco);
$oCliente->setEndereco($oEndereco);

if($oCliente->inserir()){
    $oMensagem = new Mensagens();
    $sMensagem = $oMensagem->mensagemInclusao();
    include 'exibicao.php';
}


