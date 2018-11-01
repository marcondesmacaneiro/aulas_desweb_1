<a href="banco.php"> Voltar</a>
<hr>

<?php
    include "conexao.php";

    if(isset($_POST["gravar"])){
        #echo "gravar o registro";
        $nome = $_POST["primeiro_nome"];
        $segundonome = $_POST["segundo_nome"];
        $email = $_POST["email"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        //echo $nome;
        $query = "INSERT INTO pessoa (primeiro_nome, segundo_nome, email, cidade, estado) 
                    VALUES ('{$nome}','{$segundonome}','{$email}','{$cidade}','{$estado}')";
        if ( mysqli_query($conn, $query)){
            echo "registro gravado com sucesso";
        }
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
    Email:
    <br>
    <input type="text" name="email">
    <br>
    Cidade:
    <br>
    <input type="text" name="cidade">
    <br>
    Estado:
    <br>
    <input type="text" name="estado">
    <br>

    <input type="submit" name="gravar" value="Gravar">
    <br>
    

</form>