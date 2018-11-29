<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Início</title>
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/footer.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        $verifica['index'] = true;
        $verifica['endereco'] = false;
        $verifica['cliente'] = false;
        $verifica['entrega'] = false;
        $verifica['entrega'] = false;
        $verifica['pedido'] = false;
        include './menu.php';
        ?>
        <footer class="footer">
        </footer>
    </body>
</html>