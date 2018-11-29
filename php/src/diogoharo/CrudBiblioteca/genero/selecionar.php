<?php

require '../config.php';
use app\model\Genero;

if(isset($_POST['codigo'])){
    $oGenero = new Genero();
    $oGenero->setGencodigo($_POST['codigo']);
    $oGen = $oGenero->selecionar();
    $aGeneroSelecionado = [
	$oGen->getGencodigo(),
	$oGen->getGennome()
	];
    
    echo json_encode($aGeneroSelecionado);
}  


