<html>
    <head>
        <title>BIBLIOTECA</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/login.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/footer.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
    </head>
    <body class="text-center">
        <form class="form-signin" id="informar_login" method="POST" action="" >
                <br/><br/> 
                <input type="text" class="form-control" name="login" id="login" placeholder="EMAIL " required autofocus=""/>
                <br/> 
                <input type="password" class="form-control" name="senha" id="senha" placeholder="PASSWORD" required />
                <br/>
                <button type="submit" id="btn_login" class="btn btn-success">ENTRAR</button>
                <div id="mensagem"></div>
        </form>
        <footer class="footer">
            <div class="container-fluid">
            </div>
        </footer>
        <script src="assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="assets/js/ValidarLogin.js" type="text/javascript"></script>
    </body>
</html>

