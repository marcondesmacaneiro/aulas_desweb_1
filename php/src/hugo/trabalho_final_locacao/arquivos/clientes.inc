<!DOCTYPE html>
<html>
    <head>
        <title>Clientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href='../estilo/estiloClientes.css'>
    </head>
    <section>
        <h1>Clientes</h1>
        <hr>
        <table id='tabela' border="1px">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Crédito</th>
                <th>Ação</th>
            </tr>
        <?php
            // Função para gerar tabela
            function geraTabela(){
                $sSQL = 'select clicodigo,pesnome,clicredito from tbcliente INNER JOIN tbpessoa on(tbcliente.pescodigo=tbpessoa.pescodigo)';
                $aResultados = executa($sSQL);
                foreach($aResultados AS $aResultado){
                    echo '<tr>
                            <td>'.$aResultado['clicodigo'].'</td>
                            <td>'.$aResultado['pesnome'].'</td>
                            <td>'.$aResultado['clicredito'].'</td>
                            <td><a class="acao" href="index.php?pagina=clientes&remove='.$aResultado['clicodigo'].'">Remover</a></td>
                          </tr>';
                }
            }
            
            //Condição para para realizar a exclusão de algum cliente    
            if(isset($_GET['remove'])){
                $iCodigoCliente = $_GET['remove'];
                deleta('tbcliente', 'clicodigo', $iCodigoCliente);
            }
            geraTabela();
            echo '</table>';
        ?>
        <hr>
        <br>
        <form action="index.php?pagina=clientes" method="post">
            <label for="codigo">Código:<span>*</span></label>
            <input  type="number" name="codigo" required="required">
            <br>
            <label for="nome">Nome:<span>*</span></label>
            <select name='pes_selecao_codigo' required="required">
                <?php
                    $sSQL = 'select * from tbpessoa';
                    $aResultados = executa($sSQL);
                    foreach ($aResultados AS $aResultado){
                        echo '<option value="'.$aResultado['pescodigo'].'">'.$aResultado['pesnome'].'</option>';
                    }
                ?>
            </select>
            <br>
            <label for="credito">Valor do crédito:<span>*</span></label>
            <input type="number" name="credito" required="required">
            <hr>
            <input type="reset" value='Limpar'name='limpar' >
            <input type="submit" value='Gravar' name='gravar' onclick="verificaCamposCli();">
        </form>
    </section>
</html>
<?php
    //Verifica se fora acionado o botão gravar
    if(isset($_POST['gravar'])){
        $iCodigoCliente = (int) $_POST['codigo'];
        $iNomeCliente = (int) $_POST['pes_selecao_codigo'];
        $iCreditoCliente = (float) $_POST['credito'];
        
        $aColunas = ['clicodigo', 'pescodigo', 'clicredito'];
        $aValores = [$iCodigoCliente, $iNomeCliente, $iCreditoCliente];
        
        insere('tbcliente', $aColunas, $aValores);
    }