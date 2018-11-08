<?php
    include ('conexao.php');
    //var_dump($_POST);

    if (isset($_POST["gravar"])) {
        //echo "gravar o registro";
        $nome = $_POST["primeiro_nome"];

        //echo $nome;

        $query = "insert into pessoa (primeiro_nome) values ('{$nome}')";
        $result = (mysqli_query($conn, $query)); {
            echo "Registro Gravado com Sucesso!";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="pt-br>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
 
