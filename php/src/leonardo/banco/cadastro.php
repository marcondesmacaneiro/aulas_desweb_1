<?php
    include "conexao.php";
    //var_dump($_POST);

    if (isset($_POST["gravar"])) {
        //echo "gravar o registro";
        $pnome = $_POST["primeiro_nome"];
        $snome = $_POST["segundo_nome"];
        $email = $_POST["email"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $password = $_POST["password"];


        $query = "insert into pessoa (primeiro_nome,segundo_nome,email,cidade,estado,password)
        values ('{$pnome}','{$snome}','{$email}','{$cidade}','{$estado}','$password')";
                if (mysqli_query($conn, $query)) {
            echo "Registro gravado com sucesso!";
        }
    }
?>

<form method="post">
    
    Primeiro Nome:
    <br>
    <input type="text" name="primeiro_nome">
    
    Segundo Nome:
    <br>
    <input type="text" name="segundo_nome">

    Email:
    <br>
    <input type="text" name="email">

    Cidade:
    <br>
    <input type="text" name="cidade">

    Estado:
    <br>
    <input type="text" name="estado">
    
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>