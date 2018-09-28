<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Exercício Conexão Banco</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

    <?php

        $oConexao = mysqli_connect('mysql', 'root', 'root', 'web1');

        if(mysqli_connect_error()) {
            echo 'erro: '. mysql_connect_error();
            die();
        }

        $sQuery = 'SELECT *
                     FROM pessoa';

        $sResultado = mysqli_query($oConexao, $sQuery);

        while ($aLinha = mysqli_fetch_array($sResultado)) {
            echo $aLinha['primeiro_nome'] . '</br>';
        }
    ?>

</body>
</html>


