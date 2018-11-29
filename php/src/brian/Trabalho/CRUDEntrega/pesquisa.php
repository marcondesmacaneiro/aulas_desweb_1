<?php

require_once 'config/autoload.php';
header('Content-Type: text/html; charset=utf-8');
               

?>

<html>
    <head>
        <title>Detalhes da pequisa</title>
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    </body>
</html>


<?php

if($_POST['pesquisa']){
    $oPedido  = new Pedido();
    $oCliente = new Cliente();
    $oCliente->setNome($_POST['pesquisa']);
    $oPedido->setCliente($oCliente);
    $aPequisa = $oPedido->pesquisar();
    
echo "
    <<h2>Pedidos</h2>
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

                    foreach($aPequisa as $aPed){
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
echo "
        <a class='btn btn-default' href='pedido.php'>Voltar</a>";

}
else{
echo " 
    <div id='resultado' class='container'>
        <h2>Nenhum resultado encontrado!</h2>
            <a class='btn btn-default' href='pedido.php'>Voltar</a>";
}


