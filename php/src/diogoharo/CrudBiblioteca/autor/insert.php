<?php

require '../config.php';
use app\model\Autor;
use app\model\Mensagens;
$sAutor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);

$oAutor= new Autor();
$oAutor->setAutnome($sAutor);


if($oAutor->inserir()){
    $oMensagens = new Mensagens();
    $sMensagem = $oMensagens->mensagemInclusao();
    include ("resultado.php");
}