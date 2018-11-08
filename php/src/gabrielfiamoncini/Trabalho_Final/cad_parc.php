<?php
    session_start();
    
    if((!isset ($_SESSION['Login']) == true) and (!isset ($_SESSION['Senha']) == true))
{
  unset($_SESSION['Login']);
  unset($_SESSION['Senha']);
  header('location:faz_login.php');
  }
 
$logado = $_SESSION['Login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro</h1>
    <a href="menu.php">Voltar</a>
    <form method="post">
    Primeiro Nome:
    <br>
    <input type="text" name="primeiro_nome">
    <br>
    Segundo Nome:
    <br>
    <input type="text" name="segundo_nome">
    <br>
    Email 
    <br>
    <input type="text" name="email">
    <br>
    Senha 
    <br>
    <input type="text" name="password">
    <br>
    Cidade
    <br>
    <input type="text" name="cidade">
    <br>
    Estado
    <br>
    <input type="text" name="estado">
    <br>
    <input type="submit" name="gravar" value="Gravar">    
</form>
</body>
</html>