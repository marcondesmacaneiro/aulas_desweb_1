<?php
    //var_dump($_POST);

    if(isset($_POST["gravar"])){
       //echo"Gravar o Registro";
        $nome=$_POST["primeiro_nome"];

        echo $nome;
    }
?>

<form method="post">
    Primeiro Nome:
    <br>
    <input type="text" name="primeiro_nome">
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>