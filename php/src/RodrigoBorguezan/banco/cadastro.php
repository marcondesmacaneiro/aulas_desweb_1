<?php
    //include "conexao.php";
    //var_dump(&_POST):
    $conn = mysqli_connect('mysql', 'root', 'root', 'web1');
    if (mysqli_connect_error()) {
        echo 'erro: ' . mysql_connect_error();
        die();
    }
    
    if (isset($_POST["gravar"])){
        $nome = $_POST["primeiro_nome"];

        //echo &nome;
        $query = "insert ino pessoa (primeiro_nome) values ('{$nome}')" ;
        if (mysqli_query($conn, $query)){
            echo "Registro gravado com sucesso!";
        }
    }


?>


<form method="post">
    Primeiro Nome:
    <br>
    <input type="text" name="primeiro_nome">
    <br>
    <input type="submit" name="gravar" value="gravar">

</form>

