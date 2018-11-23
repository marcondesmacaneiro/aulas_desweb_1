
<!DOCTYPE html>
<html>
    <head>
        <title>Pedidos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href='../estilo/estiloPedidos.css'>
        <script type="text/javascript" src="../js/pedidos.js"></script>
    </head>
    <section>
        <h1>Pedidos</h1>
        <hr>
        <table id='tabela'>
            <tr>
                <th>Número</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Pedido</th>
                <th>Ação</th>
            </tr>
            <?php
                function geraTabela(){
                     global $sUser;
                    if($sUser == 'adm'){
                        $sSelect = 'select pedcodigo, pesnome, peddata from tbcliente inner join tbpessoa on(tbcliente.pescodigo=tbpessoa.pescodigo) inner join tbpedido on(tbpedido.clicodigo=tbcliente.clicodigo)';
                        $aResultados = executa($sSelect);
                        foreach($aResultados AS $aResultado){
                            echo '<tr>
                                    <td>'.$aResultado['pedcodigo'].'</td>
                                    <td>'.$aResultado['pesnome'].'</td>
                                    <td>'.$aResultado['peddata'].'</td>
                                    <td><a class="acao" href="index.php?pagina=carros&pedido='.$aResultado['pedcodigo'].'">Ver</a></td>
                                    <td><a class="acao" href="index.php?pagina=pedidos&remove='.$aResultado['pedcodigo'].'">Remover</a></td>
                                 </tr>';
                        }
                    }
                    else{
                        $sSelect = 'select pedcodigo, pesnome, peddata from tbcliente inner join tbpessoa on(tbcliente.pescodigo=tbpessoa.pescodigo) inner join tbpedido on(tbpedido.clicodigo=tbcliente.clicodigo) where pesmail = '.trataValores($sUser).' ;';
                        $aResultados = executa($sSelect);
                        foreach($aResultados AS $aResultado){
                            echo '<tr>
                                    <td>'.$aResultado['pedcodigo'].'</td>
                                    <td>'.$aResultado['pesnome'].'</td>
                                    <td>'.$aResultado['peddata'].'</td>
                                    <td><a class="acao" href="index.php?pagina=Carros&pedido='.$aResultado['pedcodigo'].'">Ver</a></td>
                                    <td><a class="acao" href="index.php?pagina=pedidos&remove='.$aResultado['pedcodigo'].'">Remover</a></td>
                                 </tr>';
                        }
                        
                    }
                }
                if(isset($_GET['remove'])){
                    $iPedido = $_GET['remove'];
                    deleta('tbpedido', 'pedcodigo', $iPedido);
                }
                geraTabela();
                echo '</table>';
           ?>
        <br>
        <form method="post" action="index.php?pagina=pedidos">
            <label for="numero">Número:<span>*</span></label>
            <input  type="number" name="numero" required="required">
            <br>
            <label for="credito">Cliente:<span>*</span></label>
            <select name='cli_selecao' required="required">
                <?php
                    if($sUser == 'adm'){
                        $sSQL = 'select clicodigo,pesnome from tbcliente INNER JOIN tbpessoa on(tbcliente.pescodigo=tbpessoa.pescodigo)';
                        $aResultados = executa($sSQL);
                        foreach ($aResultados AS $aResultado){
                            echo '<option value="'.$aResultado['clicodigo'].'">'.$aResultado['pesnome'].'</option>';
                        }
                    }
                    else{
                         $sSQL = 'select clicodigo,pesnome from tbcliente INNER JOIN tbpessoa on(tbcliente.pescodigo=tbpessoa.pescodigo) where tbpessoa.pescodigo = '.$sUser['pescodigo'].' ;';
                        $aResultados = executa($sSQL);
                        foreach ($aResultados AS $aResultado){
                            echo '<option value="'.$aResultado['clicodigo'].'">'.$aResultado['pesnome'].'</option>';
                        }
                    }
                ?>
            </select>
            <label for="data">Data:<span>*</span></label>
            <input  type="date" name="data" required="required">
            <br>
            <label for="car_selecao">Carro/Qtd:<span>*</span></label>
            <select id='carSelecao' name='car_selecao' required="required">
                <?php
                    $sSQL = 'select * from tbcarro';
                    $aResultados = executa($sSQL);
                    foreach ($aResultados AS $aResultado){
                        echo '<option value="'.$aResultado['carcodigo'].'-'.$aResultado['cardescricao'].'-'.$aResultado['carvalor'].'">'.$aResultado['cardescricao'].'   --   R$'.$aResultado['carvalor'].' Reais'.'</option>';
                    }
                ?>
            </select>
            <input id='qtd' type='number' name='qtd' required="required">
            <button id='botao' type="button" name="adiciona" onclick="onClickAdicionarCarro();">+</button>
            <br>
            <label for="credito">Carros:</label>
            <table id='miniTabela'>
                <tr>
                    <th>Carro</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                </tr>
            </table>
            <label for="total">Total:</label>
            <input readonly="true" type="text" name="total" id="total" value="0">
            <input type="text" name="carros" id="carros">
            <input type="reset" value='Limpar' onclick="limpaTabela();">
            <input type="submit" value='Gravar' name="gravar" >
        </form>
    </section>
</html>
<?php
    function verificaCarrosCreditos($iTotal,$aResult,$aCredito){
        $iTotal +=  (float)$aResult[0]['clicredito'];
        $iCodigoCliente = (int) $_POST['cli_selecao'];
        $iCodigoPedido  = (int) $_POST['numero'];
        $iData          = $_POST['data'];

        if((float)$aCredito[0]['clicredito'] >= $iTotal){
            $aColunas = ['pedcodigo', 'clicodigo', 'peddata'];
            $aValores = [$iCodigoPedido, $iCodigoCliente, $iData];
            insere('tbpedido', $aColunas, $aValores);

            $aPedidos = json_decode($_POST['carros'],true);
            foreach($aPedidos AS $aPedido){
                $iPedQtd    = (int) $aPedido['qtd'];
                $icarCodigo = (int) $aPedido['codigo'];

                $aColunas = ['pedcodigo', 'carcodigo', 'pepquantidade'];
                $aValores = [$iCodigoPedido, $icarCodigo, $iPedQtd];

                insere('tbpedidocarro', $aColunas, $aValores);
            }
        }
        else{
            echo '<h1>Cliente não possui crédito suficiente</h1>';
        }
    }
    if(isset($_POST['gravar'])){
        $iCodigoCliente = (int) $_POST['cli_selecao'];
        $iCodigoPedido  = (int) $_POST['numero'];
        $iData          = $_POST['data'];
        
        $sSQL           = 'select clicredito from tbcliente where clicodigo = '.$iCodigoCliente.'; ';
        $aCredito       = executa($sSQL);
        $iTotal         = (float)$_POST['total'];
            $sSQL       = 'select SUM(pepquantidade*carvalor) AS total
                          from tbpedidocarro
                           inner join tbcarro
                            on(tbpedidocarro.carcodigo=tbcarro.carcodigo)
                           inner join tbpedido
                            on (tbpedido.pedcodigo=tbpedidocarro.pedcodigo)
                           inner join tbcliente
                            on(tbcliente.clicodigo=tbpedido.clicodigo)
                          where tbpedido.clicodigo='.$iCodigoCliente.'
                          group by tbpedido.clicodigo';
        $aResult        = executa($sSQL);
        
        if(empty($aResult)){
            verificaCarrosCreditos($iTotal,0,$aCredito);
        }
        else{
            verificaCarrosCreditos($iTotal,$aResult,$aCredito);
        }

    }

