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
            // verificacao se fora clicado em gerar senha na tabela
            if(isset($_GET['gerar'])){
                // ao entrar na condicao, será gerada uma senha de 10 caracteres aleatorios 
                $sSelectEmail     = 'select pesmail from tbpessoa where pescodigo = '.$_GET['gerar'].'; ';
                $aResultado       = executa($sSelectEmail);
                // armazenando o email do determinado codigo da pessoa
                $sEmail           = $aResultado[0]['pesmail'];
                // armazenamento dos caracteres que poderao ter na senha
                $sCaracteres      = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKMNOPQRSTUVWXYZ';
                // str_shuffle server para misturar todos os caracteres
                $sMistura         = str_shuffle($sCaracteres);
                // substr irá pegar 10 caracteres da variavel que teve a mistura
                $sSenha           = substr($sMistura,0,10);
                // mostra a nova senha para que seja possível fazer o login
                echo 'Senha '.$sSenha;
                // funcao que deveria enviar o email, esta com problemas no momento
                enviaEmail($sEmail, 'Login e Senha Gerados', 'Seja bem vindo, para logar no sistema deverá utilizar como usuario o e-mail: '.$sEmail.' e a senha: '.$sSenha.' ');
                // converte a senha para md5
                $sSenhaCodificada = md5($sSenha);
                $iCodigoPessoa    = $_GET['gerar'];
                // funcao de atualizacao da nova senha no banco de dados
                atualiza('tbpessoa','pessenha',$sSenhaCodificada,'pescodigo',$iCodigoPessoa);
            }
            geraTabela();
            echo '</table>';
        ?>
        <hr>
        <br>
         <!-- geracao de formulario de cadastro-->
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
        // preenchimento de paramentros para a funcao de insercao
        $aColunas = ['pescodigo', 'pesnome', 'pesmail'];
        $aValores = [$iCodigoPessoa, $iNomePessoa, $iEmailPessoa];
        // funcao de insercao que esta localizada no arquivo conexao.php
        insere('tbpessoa', $aColunas, $aValores);
    }
