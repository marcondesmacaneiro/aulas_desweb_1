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
    <title>Cadastro de Clientes</title>
</head>
<body>
    <h3>Dados do Usuário</h3>
    Login
    <br>
    <input type="text" name="login">
    <br>
    Senha
    <br>
    <input type="text" name="senha">
    <br>
    Privilegio
    <input type="text" name="privilegio">
    <br>
    <input type="submit" name="gravar" value="Gravar">  
    <br>
    <a href="menu.php">Voltar</a>
</body>
</html>
<?php
    //var_dump($_POST);
include "conexao.php";

if (isset($_POST["gravar"])) {
    
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $privilegio = $_POST["Privilegio"];
    
    $sql = "insert into usuario (Nome,Senha,Privilegio) values ('{$nome}','{$senha}','{$privilegio}')";
    if (mysqli_query($conn, $sql)) {
        echo "Sucesso";
    } else {
        echo "Erro";
    }
}
?>