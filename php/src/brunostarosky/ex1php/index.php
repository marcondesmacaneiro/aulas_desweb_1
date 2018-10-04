<?php 
    include "script1.php"
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        $login = 'admin';
        $senha = '1234';
        $username = '$_POST[login]';
        $pass = '$_POST[senha]';  
    ?>
</head>

<body>
    <fieldset>
        <form method="post">
            <label for="login">Login:</label>
            <input id="login" type="text" name="login">
            <br />
            <br />
            <label  for="senha">Senha:</label>
            <input type="password" id="senha" name="senha">
            <br />
            <br />
            <label name="send">Enviar</label>
            <input type="submit" name="send" value="Logar">
        </form>
        <?php
                //var_dump($_POST);
                if (($_POST['login'] === 'admin') && ($_POST['senha'] === '1234')) {            
                    
                    echo 'teste';

                } else {
                    echo 'tese';
                    
                }           
        ?>
    </fieldset>
</body>

</html>