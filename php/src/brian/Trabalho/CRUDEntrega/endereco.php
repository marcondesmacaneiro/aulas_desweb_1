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
            $verifica['endereco'] = true;
            $verifica['cliente'] = false;
            $verifica['entrega'] = false;
            $verifica['pedido'] = false;
            include './menu.php';
            include 'endereco/exibicao.php';
        ?>
        
</body>
</html>


