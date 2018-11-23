<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Sistema De Estoque</title>
    </head>
    <body>
        <div class="form-group container index">
            <form id="form_login" method="POST" action="requisicao_login.php">
                <label for="usuario">Usuário:</label>
                <input type="text" name="login" id="login" class="form-control" placeholder="Usuário">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                <br>
                <button class="btn btn-primary" id="btn_login">Login</button>
            </form>
        </div>
    </body>
</html>