<?php

    include "conexao.php";
    //var_dump($_POST);//olhar o que ta rolado
    if(isset($_POST["gravar"])){
        //echo "Gravar o registro";
        $nome = $_POST["primeiro_nome"];
        //echo $nome;
        $query= "INSERT INTO pessoa (primeiro_nome) values ('{$nome}')";
        if(mysqli_query($conecta, $query)){
            echo "Registro gravado com sucesso! ";
    
        }
    }

?>
<a href="index.php">Voltar</a>
    <form method="POST">
        Primeiro nome:
        <br>
        <input type="text" name="primeiro_nome">
        <br>
        Segundo nome:
        <br>
        <input type="text" name="primeiro_nome">
        <br>
        Primeiro nome:
        <br>
        <input type="text" name="primeiro_nome">
        <br>
        Primeiro nome:
        <br>
        <input type="text" name="primeiro_nome">
        <br>
        Primeiro nome:
        <br>
        <input type="text" name="primeiro_nome">
        <br>
        <input type="submit" name="gravar" value="Gravar">
    </form>
