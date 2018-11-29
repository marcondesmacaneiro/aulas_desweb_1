<html>
    <head>
        <title>Início</title>
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/jquery-estilo.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        $verifica['genero'] = false;
        $verifica['livro'] = false;
        $verifica['localizacao'] = false;
        $verifica['autor'] = false;
        $verifica['livroautor'] = false;
        header("Content-Type: text/html; charset=utf-8");
        include 'menu.php';
        ?>
    </body>
</html>

