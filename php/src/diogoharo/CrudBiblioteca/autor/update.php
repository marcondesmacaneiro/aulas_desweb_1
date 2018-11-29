<?php

require '../config.php';
use app\model\Autor;
use app\model\Mensagens;

$iCodigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$sAutor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);

$oAutor = new Autor();
$oAutor->setAutcodigo($iCodigo);
$oAutor->setAutnome($sAutor);
$oAutor->alterar();

if($oAutor->alterar()){
    $oMensagens = new Mensagens();
    $sMensagem = $oMensagens->mensagemAlteracao();
    include ("resultado.php");
}

