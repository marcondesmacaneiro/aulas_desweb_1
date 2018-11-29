<?php

require_once '../config/autoload.php';
header('Content-Type: text/html charset=utf=8');


if(isset($_POST['codigo'])){
    $oCliente = new Cliente();
    $oCliente->setCodigo($_POST['codigo']);
    $oClienteSelecionado = $oCliente->selecionar();
        $aCli = [
            $oClienteSelecionado->getCodigo(),
            $oClienteSelecionado->getNome(),
            $oClienteSelecionado->getEndereco()->getCodigo()
        ];
    echo json_encode($aCli);
}
        

