<!DOCTYPE html>
<html>
    <head>
        <title>Clientes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href='../estilo/estiloPessoas.css'>
    </head>
    <section>
        <h1>Pessoas</h1>
        <hr>
        <table id='tabela' border="1px">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ação</th>
                <th>Gerar senha</th>
            </tr>
        <?php
            // Função para gerar tabela
            function geraTabela(){
                $sSQL = 'select * from tbpessoa';
                $aResultados = executa($sSQL);
                foreach($aResultados AS $aResultado){
                    echo '<tr>
                            <td>'.$aResultado['pescodigo'].'</td>
                            <td>'.$aResultado['pesnome'].'</td>
                            <td>'.$aResultado['pesmail'].'</td>
                            <td><a class="acao" href="index.php?pagina=pessoas&remove='.$aResultado['pescodigo'].'">Remover</a></td>
                            <td><a class="acao" href="index.php?pagina=pessoas&gerar='.$aResultado['pescodigo'].'">Gerar</a></td>
                          </tr>';
                }
            }
            
            //Condição para para realizar a exclusão de alguma pessoa    
            if(isset($_GET['remove'])){
                $iCodigoPessoa = $_GET['remove'];
                deleta('tbpessoa', 'pescodigo', $iCodigoPessoa);
            }
            if(isset($_GET['gerar'])){
                $sSelectEmail     = 'select pesmail from tbpessoa where pescodigo = '.$_GET['gerar'].'; ';
                $aResultado       = executa($sSelectEmail);
                $sEmail           = $aResultado[0]['pesmail'];
                $sCaracteres      = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKMNOPQRSTUVWXYZ';
                $sMistura         = str_shuffle($sCaracteres);
                $sSenha           = substr($sMistura,0,10);
                echo 'Senha '.$sSenha;
                enviaEmail($sEmail, 'Login e Senha Gerados', 'Seja bem vindo, para logar no sistema dever� utilizar como usu�rio o e-mail: '.$sEmail.' e a senha: '.$sSenha.' ');
                $sSenhaCodificada = md5($sSenha);
                $iCodigoPessoa    = $_GET['gerar'];
                atualiza('tbpessoa','pessenha',$sSenhaCodificada,'pescodigo',$iCodigoPessoa);
            }
            geraTabela();
            echo '</table>';
        ?>
        <hr>
        <br>
        <form action="index.php?pagina=pessoas" method="post">
            <label for="codigo">Código:<span>*</span></label>
            <input  type="number" name="codigo" required="required">
            <br>
            <label for="nome">Nome:<span>*</span></label>
            <input type="text" name="nome" required="required">
            <br>
            <label for="email">E-mail:<span>*</span></label>
            <input type="email" name="email" required="required">
            <hr>
            <input type="reset" value='Limpar'name='limpar' >
            <input type="submit" value='Gravar' name='gravar'>
        </form>
    </section>
</html>
<?php
    //Verifica se fora acionado o botão gravar
    if(isset($_POST['gravar'])){
        $iCodigoPessoa = (int) $_POST['codigo'];
        $iNomePessoa   = $_POST['nome'];
        $iEmailPessoa  = $_POST['email'];
        
        $aColunas = ['pescodigo', 'pesnome', 'pesmail'];
        $aValores = [$iCodigoPessoa, $iNomePessoa, $iEmailPessoa];
        
        insere('tbpessoa', $aColunas, $aValores);
    }
