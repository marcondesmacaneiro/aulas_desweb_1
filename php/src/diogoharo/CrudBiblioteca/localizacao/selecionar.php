<?php

require '../config.php';
use app\model\Localizacao;

if(isset($_POST['codigo'])){
    $oLocalizacao = new Localizacao();
    $oLocalizacao->setLoccodigo($_POST['codigo']);
    $oLoc = $oLocalizacao->selecionar();
    $aLocalizacaoSelecionada = [
	$oLoc->getLoccodigo(),
	$oLoc->getLocnome()
	];
    
    echo json_encode($aLocalizacaoSelecionada);
}  


