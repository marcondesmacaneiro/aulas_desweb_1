<?php
    require('../conexao.php');

    $sQuery = 'SELECT *
                 FROM pessoa';

    $oResultado = mysqli_query($oConexao, $sQuery);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Busca</title>
    <style>
        table, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Primeiro nome</td>
            <td>Segundo nome</td>
            <td>Email</td>
            <td>Cidade</td>
            <td>Estado</td>
            <td>Ações</td>
        </tr>
        <?php
            while($iLinha = mysqli_fetch_array($oResultado)){
                ?>
                    <tr>
                        <td><?=$iLinha['id']?></td>
                        <td><?=$iLinha['primeiro_nome']?></td>
                        <td><?=$iLinha['segundo_nome']?></td>
                        <td><?=$iLinha['email']?></td>
                        <td><?=$iLinha['cidade']?></td>
                        <td><?=$iLinha['estado']?></td>
                        <td>Ações</td>
                    </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>