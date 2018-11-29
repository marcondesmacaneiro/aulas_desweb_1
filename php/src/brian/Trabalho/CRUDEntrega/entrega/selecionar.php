<?php

require_once '../config/autoload.php';
header('Content-Type: text/html charset=utf=8');

if(isset($_POST['codigo'])){
    $oEntrega = new Entrega();
    $oEntrega->setCodigo($_POST['codigo']);
    $oEntregaSelecionado = $oEntrega->selecionar();
        $aEnt = [
            $oEntregaSelecionado->getCodigo(),
            $oEntregaSelecionado->getTipo(),
        ];
    echo json_encode($aEnt);
}
        

