<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bemvindo</title>
</head>
<body>
    <h1>Bem Vindo</h1>
    <?php
        session_start();
        if(!isset($_SESSION['teste'] || $_SESSION['teste']!=true){
            
        }else{
            echo "Bemvindo".$_POST['login'];
        }
    ?>
</body>
</html>