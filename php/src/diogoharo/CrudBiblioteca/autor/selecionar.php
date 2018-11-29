<?php

require '../config.php';
use app\model\Autor;

if(isset($_POST['codigo'])){
    $oAutor = new Autor();
    $oAutor->setAutcodigo($_POST['codigo']);
    $oLoc = $oAutor->selecionar();
    $aAutorSelecionado = [
	$oLoc->getAutcodigo(),
	$oLoc->getAutnome()
	];
    
    echo json_encode($aAutorSelecionado);
}  


