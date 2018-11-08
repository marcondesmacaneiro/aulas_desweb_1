<?php

require('conexao.php');

$query = "select * from pessoa";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    

<a href="cadastro.php">Cadastro</a>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Primeiro Nome</td>
        <td>Segundo Nome</td>
        <td>E-mail</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Ações</td>
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?=$linha["id"]?></td>
                    <td><?=$linha["primeiro_nome"]?></td>
                    <td><?=$linha["segundo_nome"]?></td>
                    <td><?=$linha["email"]?></td>
                    <td><?=$linha["cidade"]?></td>
                    <td><?=$linha["estado"]?></td>
                    <td>
                        <a href="remover_detalhes.php?id=<?=$linha["id"]?>">Remover</a>
                        <br>
                        <a href="atualizar_form.php?id=<?=$linha["id"]?>">Atualizar</a>
                </tr>
            <?php
        }
    ?>
</table>
</body>
</html>
