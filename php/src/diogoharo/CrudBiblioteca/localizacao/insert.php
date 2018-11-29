<?php

require '../config.php';
use app\model\Localizacao;
use app\model\Mensagens;
$sLocalizacao = filter_input(INPUT_POST, 'localizacao', FILTER_SANITIZE_STRING);

$oLocalizacao= new Localizacao();
$oLocalizacao->setLocnome($sLocalizacao);


if($oLocalizacao->inserir()){
    $oMensagens = new Mensagens();
    $sMensagem = $oMensagens->mensagemInclusao();
    include ("resultado.php");
}