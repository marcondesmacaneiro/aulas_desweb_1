<?php

$sNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$oPedido = new Pedido();
$oCliente = new Cliente();
$oCliente->setNome($sNome);
$oPedido->setCliente($oCliente);
$aPesquisa = $oPedido->pesquisar();

if($aPesquisa){
echo "
    <h2>Resultado da pesquisa</h2>
                <form name='form1' id='form1' >
                    <table class='table table-striped' id='tabela'>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Código</th>
                                <th>Pedido</th>
                                <th>Data de Solicitação</th>
                                <th>Data de Entrega</th>
                                <th>Cliente</th>
                                <th>Tipo da Entrega</th>
                                <th>Situação</th>
                            </tr>
                        </thead>
                        <tbody>";

                    foreach($aPesquisa as $aPed){
    echo " 
                        <tr>
                            <td><input type='checkbox' value='" . $aPed->getCodigo() . "'
                                name='checkbox[]' id='checkbox[]'></td> 
                            <td>" . $aPed->getCodigo()    . "</td> 
                            <td>" . $aPed->getDescricao() . "</td> 
                            <td>" . $aPed->getDatasolicitacao() . "</td> 
                            <td>" . $aPed->getDataentrega() . "</td> 
                            <td>" . $aPed->getCliente()->getCodigo() . "</td> 
                            <td>" . $aPed->getEntrega()->getCodigo() . "</td> 
                            <td>" . $aPed->getSituacao() . "</td> 
                        </tr>";
    }

echo "
                        </tbody>
                    </table>";
}

else{
    alert('Pesquisa não encontrada!');
}

