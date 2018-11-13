<?php
    include "conexao.php";
    //var_dump($_POST);

    if (isset($_POST["gravar"])) {
       
        $pnome = $_POST["primeiro_nome"];
        $snome = $_POST["sobrenome"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $logradouro = $_POST["logradouro"];
        $complemento = $_POST["complemento"];
        $cidade = $_POST["cidade"];
        $uf = $_POST["uf"];


        $query = "insert into pessoa (primeiro_nome,sobrenome,telefone,email,logradouro,complemento,cidade,uf)
        values ('{$pnome}','{$snome}','{$telefone}','{$email}','{$logradouro}','$complemento','$cidade','$uf')";
                       if (mysqli_query($conn, $query)) {
            echo "Cliente Cadastrado com sucesso!";
        }
    }
?>

<form method="post">
    
    Primeiro Nome:    <input type="text" name="primeiro_nome">
    <br>
    Sobrenome:   <input type="text" name="sobrenome">
    <br>
    Telefone:   <input type="text" name="telefone">
    <br>
    E-mail:      <input type="text" name="email">
    <br>
    Logradouro:   <input type="text" name="logradouro">
    <br>
    Complemento:  <input type="text" name="complemento">
    <br>
    Cidade:   <input type="text" name="cidade">
    <br>
    Estado:   <input type="text" name="uf">
    <br>
    
    <input type="submit" name="gravar" value="Gravar">
</form>