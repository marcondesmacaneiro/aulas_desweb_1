<?php

require_once '../config/autoload.php';

$sDescricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$sSoliData = filter_input(INPUT_POST, 'solidata', FILTER_SANITIZE_STRING);
$sEntreData = filter_input(INPUT_POST, 'entredata', FILTER_SANITIZE_STRING);
$sClientes = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$sEntrega = filter_input(INPUT_POST, 'entrega', FILTER_SANITIZE_STRING);
$sSituacao = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);

$oPedido = new Pedido();
$oCliente = new Cliente();
$oEntrega = new Entrega();
$oPedido->setDescricao($sDescricao);
$oPedido->setDatasolicitacao($sSoliData);
$oPedido->setDataentrega($sEntreData);
$oCliente->setCodigo($sClientes);
$oEntrega->setCodigo($sEntrega);
$oPedido->setSituacao($sSituacao);
$oPedido->setCliente($oCliente);
$oPedido->setEntrega($oEntrega);

if($oPedido->inserir()){
    $oMensagem = new Mensagens();
    $sMensagem = $oMensagem->mensagemInclusao();
    include ("exibicao.php");
}
