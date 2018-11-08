<html>
    <head>
        <title>Formulário de Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            div{
                border: 1px solid black;
                display: block;
                margin: 20% auto auto auto;
                padding: 20px 10px 10px 10px;
                width: 50%;
                text-align: center;
            }
            html{
                background-color: silver;
            }
        </style>
    </head>
    <body>
        <div>
            <form action="form.php" method="POST">
                <label>Usuáriooo: </label>
                <input type="text" name="user">
                <label>Senha: </label>
                <input type="password" name="senha">
                <button>Logar</button>
            </form>
        </div>
    </body>
</html>
