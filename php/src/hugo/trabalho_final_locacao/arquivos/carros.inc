<!DOCTYPE html>
<html>
    <head>
        <title>Carros</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href='../estilo/estiloCarros.css'>
    </head>
    <section>
        <h1>Carros</h1>
        <hr>
        <?php
            function geraTabela(){
                echo '<table id="tabela">
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Valor Diária</th>
                            <th>Ação</th>';
                $select = 'select * from tbcarro';
                $aResult = executa($select);
                echo '</tr>';
                foreach($aResult AS $aResultado){
                    echo '<tr>
                            <td>'.$aResultado['carcodigo'].'</td>
                            <td>'.$aResultado['cardescricao'].'</td>
                            <td>'.$aResultado['carvalor'].'</td>
                            <td><a class="acao" href="index.php?pagina=carros&remove='.$aResultado['carcodigo'].'">Remover</a></td>
                          </tr>';
                }
                echo '</table>';
            }
            
            function geraTabelaPedido(){
                echo '<table id="tabela">
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Quantidade</th>
                            <th>Ação</th>';
                if(isset($_GET['pedido'])){
                    $iPedidoTabela = $_GET['pedido'];
                    echo'<h2>Pedido número '.$iPedidoTabela.'</h2>';

                    $sSelect = 'select tbcarro.carcodigo, tbcarro.cardescricao, tbcarro.carvalor, tbpedidocarro.pepquantidade 
                                from tbcarro 
                                 inner join tbpedidocarro 
                                  on(tbcarro.carcodigo = tbpedidocarro.carcodigo)
                                where pedcodigo = '.$iPedidoTabela.';';
                    $aResultados = executa($sSelect);

                    foreach ($aResultados AS $aResultado){
                        echo ' <tr>
                                <td>'.$aResultado['carcodigo'].'</td>
                                <td>'.$aResultado['cardescricao'].'</td>
                                <td>'.$aResultado['carvalor'].'</td>
                                <td>'.$aResultado['pepquantidade'].'</td>
                                <td><a class="acao" href="index.php?pagina=carros&codigo='.$aResultado['carcodigo'].'">Remover</a></td>
                               </tr>';
                    }
                    echo '</table>';
                }
            }
            if(isset($_GET['pedido'])){
                geraTabelaPedido();
            }
            else{
                geraTabela();
            }
            
            if(isset($_GET['remove'])){
                $iCodigoCarro = $_GET['remove'];
                deleta('tbcarro', 'carcodigo', $iCodigoCarro);
            }
            
            if(isset($_GET['codigo'])){
                $iCodigoCarro = $_GET['codigo'];
                deleta('tbpedidocarro', 'carcodigo', $iCodigoCarro);
                geraTabelaPedido();
            }
        ?>
        <hr>
        <br>
        <form action="index.php?pagina=carros" method="POST">
            <label for="codigo">Código:<span>*</span></label>
            <input type="number" name="codigo" required="required">
            <br>
            <label for="descricao">Descrição:<span>*</span></label>
            <input type="text" name="descricao" required="required">
            <br>
            <label for="valor">Valor:<span>*</span></label>
            <input type="number" name="valor" required="required">
 
            <input type="reset" value='Limpar'>
            <input type="submit" value='Gravar' name="gravar">
        </form>
    </section>
</html>
<?php
    if(isset($_POST['gravar'])){
        $iCod = (int) $_POST['codigo'];
        $sDescricao = $_POST['descricao'];
        $iValor = (float) $_POST['valor'];
        
        $aColunas = ['carcodigo', 'cardescricao', 'carvalor'];
        $aValores = [$iCod, $sDescricao, $iValor];
        
        insere('tbcarro', $aColunas, $aValores);
    }
