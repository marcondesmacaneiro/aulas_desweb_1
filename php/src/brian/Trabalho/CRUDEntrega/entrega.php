<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            require_once 'config/autoload.php';
            $verifica['index'] = false;
            $verifica['endereco'] = false;
            $verifica['cliente'] = false;
            $verifica['entrega'] = true;
            $verifica['pedido'] = false;
            include './menu.php';
            include 'entrega/exibicao.php';
        ?>
        
</body>
</html>


