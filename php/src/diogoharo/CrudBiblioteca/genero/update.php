<?php

require '../config.php';
use app\model\Genero;
use app\model\Mensagens;

$iCodigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$sGenero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);

$oGenero = new Genero();
$oGenero->setGencodigo($iCodigo);
$oGenero->setGennome($sGenero);
$oGenero->alterar();

if($oGenero->alterar()){
    $oMensagens = new Mensagens();
    $sMensagem = $oMensagens->mensagemAlteracao();
    include ("resultado.php");
}

