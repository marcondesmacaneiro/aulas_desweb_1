<!DOCTYPE html>
<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/jquery-estilo.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/login.css" rel="stylesheet" type="text/css"/>
        <title>Login</title>
    </head>
    <body>
        <div id="div_login">
            <form id="form_login" method="POST" action="" class="form-signin">
                <label for="login" id="lb">Login</label>
                <br/>
                <input type="text" name="login" id="login" class="input-sm">
                <br>
                <label for="senha" id="lb">Senha</label>
                <br/>
                <input type="password" name="senha" id="senha" class="input-sm">
                <br>
                <button id="btn_login" class="btn-block">Login</button>
            </form>
            <br/>
            <br/>
            <div id="mensagem"></div>
        </div>
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script src="assets/js/login.js" type="text/javascript"></script>
    </body>
</html>
