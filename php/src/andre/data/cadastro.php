<?php

    //var_dump($_POST);

    include "conexao.php";

    if(isset($_POST["gravar"])) {
        //echo "gravar o registro";
        $nome = $_POST["primeiro_nome"];
        $sobrenome = $_POST["primeiro_nome"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $email = $_POST["email"];

        $query = "insert into pessoa (primeiro_nome) values ('{$nome}','{$sobrenome}','{$cidade}','{$estado}','{$email}')";

        if(mysqli_query($conn, $query)) {
            echo "Registro gravado com sucesso";
        }

        echo $nome;
    }


?>





<form method="post">
    Primeiro nome:
    <br>
    <input type="text" name="primeiro_nome">
    <br>
    Segundo nome:
    <br>
    <input type="text" name="segundo_nome">
    <br>
    Cidade:
    <br>
    <input type="text" name="cidade">
    <br>
    Estado:
    <br>
    <input type="text" name="estado">
    <br>
    Email:
    <br>
    <input type="text" name="email">
    <br>
    <input type="submit" name="gravar" value="Gravar">


</form>