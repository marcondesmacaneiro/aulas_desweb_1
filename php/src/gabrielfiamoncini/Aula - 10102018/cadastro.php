<?php
    //var_dump($_POST);
include "conexao.php";

if (isset($_POST["gravar"])) {
    //echo"Gravar o Registro";
    $nome = $_POST["primeiro_nome"];
    $sobrenome = $_POST["segundo_nome"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];

   //echo $nome;
    $sql = "insert into pessoa (primeiro_nome,segundo_nome,email,password,cidade,estado) values ('{$nome}','{$sobrenome}','{$email}','{$senha}','$cidade','{$estado}')";
    if (mysqli_query($conn, $sql)) {
        echo "Sucesso";
    } else {
        echo "Erro";
    }
}
?>

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