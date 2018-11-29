<?php

require '../config.php';
use app\model\Genero;
use app\model\Mensagens;
$sGenero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);

$oGenero= new Genero();
$oGenero->setGennome($sGenero);


if($oGenero->inserir()){
    $oMensagens = new Mensagens();
    $sMensagem = $oMensagens->mensagemInclusao();
    include ("resultado.php");
}