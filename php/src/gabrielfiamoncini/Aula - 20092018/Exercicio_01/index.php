<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" >
    <fieldset>
    <legend>Autenticação</legend>
    <label >Usuário</label>
    <input type="text" name="login" id="login">
    <label>Senha</label>
    <input type="password" name="senha" id="senha">
    <input type="submit" value="logar">
    </fieldset>
    </form>
</body>
</html>

<?php
    session_start();

    $login = 'adm';
    $senha = '123';

    if($login=$_POST['login'] and $senha=$_POST['senha']){
        echo "Entrou com sucesso";
        $_SESSION['teste']=true;
        header("location:bemvindo.php");
    }
    else{
        echo "Não cadastrado";
    }

?>