<?php
    //var_dump($_POST);
include "conexao.php";

if (isset($_POST["gravar"])) {
       //echo"Gravar o Registro";
    $nome = $_POST["primeiro_nome"];
    $sobrenome = $_POST["segundo_nome"];

        //echo $nome;
    $sql = "insert into pessoa (primeiro_nome,segundo_nome) values ('{$nome}','{$sobrenome}')";
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
    <input type="submit" name="gravar" value="Gravar">
</form>