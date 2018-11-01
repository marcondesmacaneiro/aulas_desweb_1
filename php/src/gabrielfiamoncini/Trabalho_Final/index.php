<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GF Financeira</title>
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
    include "conexao.php";
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "Select Login from Login where Login ='{$login}' and Senha='{$senha}'";
    $result =  mysqli_query($conn,$sql);
       
    if (mysqli_num_rows($result) == 1) {
        
        echo "Bem Vindo !";
        include "menu.php";

    } else {
        echo'Dados Invalidos';        
    }
?>