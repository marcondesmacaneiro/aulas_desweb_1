<?php

require_once '../config/autoload.php';

$sTipo = filter_input(INPUT_POST, 'endtipo', FILTER_SANITIZE_STRING);
$sEndereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);

$oEndereco = new Endereco();
$oEndereco->setTipo($sTipo);
$oEndereco->setDescricao($sEndereco);

if($oEndereco->inserir()){
    $oMensagens = new Mensagens();
    $sMensagem = $oMensagens->mensagemInclusao();
    include 'resultado.php';
}
