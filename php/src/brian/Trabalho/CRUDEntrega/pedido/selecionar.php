<?php

require_once '../config/autoload.php';
header('Content-Type: text/html charset=utf=8');

if(isset($_POST['codigo'])){
    $oPedido = new Pedido();
    $oPedido->setCodigo($_POST['codigo']);
    $oPedidoSelecionado = $oPedido->selecionar();
        $aPed = [
            $oPedidoSelecionado->getCodigo(),
            $oPedidoSelecionado->getDescricao(),
            $oPedidoSelecionado->getDatasolicitacao(),
            $oPedidoSelecionado->getDataentrega(),
            $oPedidoSelecionado->getCliente()->getCodigo(),
            $oPedidoSelecionado->getEntrega()->getCodigo(),
            $oPedidoSelecionado->getSituacao(),
        ];
    echo json_encode($aPed);
}
        

