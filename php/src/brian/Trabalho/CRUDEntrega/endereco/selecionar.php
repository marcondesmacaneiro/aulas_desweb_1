<?php

require_once '../config/autoload.php';
header('Content-Type: text/html charset=utf=8');

if(isset($_POST['codigo'])){
    $oEndereco = new Endereco();
    $oEndereco->setCodigo($_POST['codigo']);
    $oEnderecoSelecionado = $oEndereco->selecionar();
        $aEnd = [
            $oEnderecoSelecionado->getCodigo(),
            $oEnderecoSelecionado->getTipo(),
            $oEnderecoSelecionado->getDescricao(),
        ];
    echo json_encode($aEnd);
}
        

