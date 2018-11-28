<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Sistema De Estoque</title>
    </head>
    <body>
        <div class="text-center form-group container index4 mx-auto">
            <form id="form_login" method="POST" action="requisicao_login.php">
                <table>
                    <tr>
                        <td>
                            <img src="img/login.svg" class="login float-left">
                            <input type="text" name="login" id="login" class="form-control login2 mx-auto" placeholder="Usuário">
                        </td>    
                    </tr>
                    <tr>
                        <td>
                            <img src="img/senha.svg" class="login float-left">
                            <input type="password" name="senha" id="senha" class="form-control login2 mx-auto" placeholder="Senha">
                        </td>    
                    </tr>
                </table>
                <button class="btn btn-primary btn_login float-right mt-2" id="btn_login">Login</button>
            </form>
        </div>
    </body>
</html>