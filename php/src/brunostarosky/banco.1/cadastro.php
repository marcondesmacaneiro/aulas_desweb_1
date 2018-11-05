<?php

//var_dump=($_POST);
include "conexao.php";

if (isset($_POST["gravar"])) {
    //echo "gravar o registro";
    $nome = $_POST["primeiro_nome"];
    
    //echo $nome;

    $query = "insert into pessoa (primeiro_nome) values ('{$nome}')";
    if (mysqli_query($conn, $query)){
        echo "registro gravado com sucesso";
    }

}

?>




<form method="post">

    Primeiro nome:
    <br>
    <input type="text" name="primeiro_nome">
    <br>
    <input type="submit" name="gravar" value="gravar">
    </form>
