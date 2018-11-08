<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Clientes</title>
</head>
<body>
    <h3>Dados do Cliente</h3>
    <form method="post">
    Nome:
    <br>
    <input type="text" name="nome">
    <br>
    CpfCnpj:
    <br>
    <input type="text" name="cpfcnpj">
    <br>
    Endereco
    <br>
    <input type="text" name="endereco">
    <br>
    Numero
    <br>
    <input type="text" name="numero">
    <br>
    Bairro
    <br>
    <input type="text" name="bairro">
    <br>
    Cidade
    <br>
    <input type="text" name="cidade">
    <br>
    Estado
    <br>
    <input type="text" name="estado">
    <br>
    Pais
    <br>
    <input type="text" name="pais">
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
    //echo"Gravar o Registro";
    $nome = $_POST["nome"];
    $cpfcnpj = $_POST["cpfcnpj"];
    $endereco = $_POST["endereco"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $pais = $_POST["pais"];

   //echo $nome;
    $sql = "insert into pessoas (Nome,CpfCnpj,Endereco,Numero,Bairro,Cidade,Estado,Pais) values ('{$nome}','{$cpfcnpj}','{$endereco}','{$numero}','{$bairro}','{$cidade}','{$estado}','{$pais}')";
    if (mysqli_query($conn, $sql)) {
        echo "Sucesso";
    } else {
        echo "Erro";
    }
}
?>