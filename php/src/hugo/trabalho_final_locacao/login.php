<?php
   session_start(); 
   // iclusão dos dois arquivos abaixo se faz necessária para que possa ser realizada as 
   // operações no banco de dados
   include_once 'arquivos/config.inc';
   include_once 'arquivos/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="estilo/login.css">
</head>
<body onload="carrega();">
        <div id="loginCampo">
            <form action="" method="POST">
                <legend id="login">Login</legend>
                <label class="entrar" for="usuario">E-mail</label>
                <input type="text" name="usuario" placeholder="exemplo@exemplo.com.br">
                <label class="entrar" for="senha">Senha</label>
                <input type="password" name="senha" placeholder="senha...">
                <input id="submeter" type="submit" value='Entrar  ' name="entrar">
            </form>
        </div>
</body>
</html>

<?php
// Verificação se o botão de login foi clicado
    if(isset($_POST['entrar'])){
        $sUsuario    = $_POST['usuario'];
        $sSenha      = $_POST['senha'];
        //Verificação do usuário adm, quando não for inserido nada nos campos
        if(($sUsuario == '') && ($sSenha == '')){
            $_SESSION['usuario'] = serialize('adm');
            header('Location: arquivos/index.php?pagina=home');
            echo '<span>Logado como ADM</span>';
            die();
        }
        // Conversão da senha pra md5 para verificação no banco de dados, já que no mesmo está armazenado com a mesma codificação
        $sSenha      = md5($sSenha);
        $sSQL        = 'select * from tbpessoa where pesmail = '.trataValores($sUsuario).' and pessenha = '.trataValores($sSenha).' ';
        $aResultado = executa($sSQL);
        // caso a cunsulta ao banco retorne algo, significa que o email e senha existem no banco
        if($aResultado){
            $_SESSION['usuario'] = serialize($aResultado[0]); //recebendo o resultado da consulta ele terá todas as informações do usuário
            header('Location: arquivos/index.php?pagina=home');
        }
        // caso a consulta não retorne nenhum valor, significa que o email e senha informado não existem
        else{
           echo '<p id="erro">Senha ou e-mail incorretos, tente novamente</p>'; 
        }
    }
    else{
        // se a sessão estiver inicializada ela é destruida 
        if(isset($_SESSION)){
            session_destroy();
        }
    }
