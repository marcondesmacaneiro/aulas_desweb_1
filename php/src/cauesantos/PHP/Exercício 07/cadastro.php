<?php
    //var_dump($_POST);

    include('../conexao.php');

    if(isset($_POST['gravar'])){
        // echo 'gravar o registro';
        //echo ($_POST['nome']);

        $sNome = $_POST['nome'];

        $sQuery  = "insert into pessoa (primeiro_nome) values ('{$sNome}')";

        if(mysqli_query($oConexao, $sQuery)){
            echo '<script>alert("Registrado com sucesso")</script>';
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
        <label>Nome</label>
        <input type="text" name="nome">
        <input type="submit" name="gravar" value="Cadastrar">
    <form>
</body>
</html>

