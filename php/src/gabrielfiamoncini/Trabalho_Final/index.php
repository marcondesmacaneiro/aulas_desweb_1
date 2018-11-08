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
    <title>Document</title>
</head>
<body>
    <h1>Menu</h1>
    <a href="cad_pes.php">Cadastrar Clientes</a>
    <br>
    <a href="lis_pes.php">Listar Clientes</a>
    <br>   
    <a href="cad_parc.php">Cadastrar Parcelas</a>
    <br>
    <a href="list_parc.php">Listar Parcelas</a>
    <br>
    <a href="index.php">Sair</a>
</body>
</html>
