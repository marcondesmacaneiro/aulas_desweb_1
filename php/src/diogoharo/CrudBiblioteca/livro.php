
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <nav>
        <img src="assets/imagens/trabalhophp.png"/>
    </nav>
    <body>
        <?php
        header('Content-Type: text/html; charset=utf-8');
        $verifica['genero'] = false;
        $verifica['livro'] = true;
        $verifica['localizacao'] = false;
        $verifica['autor'] = false;
        $verifica['livroautor'] = false;
        require_once 'config.php';
        include ("menu.php");
        include ("livro/exibicao.php");
        ?>
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/livro.js" type="text/javascript"></script>
    </body>
</html>

