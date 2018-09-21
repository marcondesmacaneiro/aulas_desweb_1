<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login com Session do PHP</title>
    </head>
    <body>
        <form id="form_login" method="POST" action="requisicaoLogin.php">
            <input type="text" name="login" id="login" >
            <br>
            <input type="password" name="senha" id="senha" >
            <br>
            <button>Login</button>
        </form>
        
        <div id="mensagem"></div>
        
    </body>
</html>