<?php

require '../config.php';
use app\model\Localizacao;
use app\model\Mensagens;

$iCodigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$sLocalizacao = filter_input(INPUT_POST, 'localizacao', FILTER_SANITIZE_STRING);

$oLocalizacao = new Localizacao();
$oLocalizacao->setLoccodigo($iCodigo);
$oLocalizacao->setLocnome($sLocalizacao);
$oLocalizacao->alterar();

if($oLocalizacao->alterar()){
    $oMensagens = new Mensagens();
    $sMensagem = $oMensagens->mensagemAlteracao();
    include ("resultado.php");
}

