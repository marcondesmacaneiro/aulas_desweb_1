<?php
    include "conexao.php";
    //var_dump($_POST);

    if (isset($_POST["gravar"])) {
        //echo "gravar o registro";
        $nome = $_POST["primeiro_nome"];

        //echo $nome;

        $query = "insert into pessoa (primeiro_nome) values ('{$nome}')";
        if (mysqli_query($conn, $query)) {
            echo "Registro gravado com sucesso!";
        }
    }
?>

<form method="post">
    Primeiro Nome:
    <br>
    <input type="text" name="primeiro_nome">
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>
    
    
    
    
