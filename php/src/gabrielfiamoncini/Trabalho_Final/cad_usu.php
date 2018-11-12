<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h3>Dados do Usuário</h3>
    <form method="post">
    Login
    <br>
    <input type="text" name="login">
    <br>
    Senha
    <br>
    <input type="password" name="senha">
    <br>
    <input type="submit" name="gravar" value="Gravar">  
    <br>
    </form>
    <a href="faz_login.php">Voltar</a>    
</body>
</html>
<?php
    //var_dump($_POST);
include "conexao.php";

if (isset($_POST["gravar"])) {
    
    $login = $_POST["login"];
    $senha = $_POST["senha"];
       
    $sql = "insert into usuario (Login,Senha,Privilegio) values ('{$login}','{$senha}',0)";
    if (mysqli_query($conn, $sql)) {
        echo "Sucesso";
    } else {
        echo "Erro";
    }
}
?>