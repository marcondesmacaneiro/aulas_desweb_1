<?php
   // var_dump($_POST);

     include ('conexao.php');
 

    if (isset($_POST["gravar"])) {
        echo "<script> alert('Gravado com Sucesso')</script>";
        $nome = $_POST["primeiro_nome"];

        //echo $nome;

        $query = "insert into pessoa (primeiro_nome) values ('{$nome}')";
        $result = mysqli_query($conn, $query); {
            echo "Registro Gravado com Sucesso!";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <form method="post">
        Primeiro Nome:
        <br>
        <input type="text" name="primeiro_nome">
        <br>
        <input type="submit" name="gravar" value="Gravar">
    </form>

</body>
</html>
