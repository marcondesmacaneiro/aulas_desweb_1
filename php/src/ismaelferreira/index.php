<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ismael</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
    .ui-autocomplete { z-index:2147483647; }
    </style>
</head>
<body>
    <?php
    if (!$_SESSION["valid"]) {
        require 'loginform.php';
    } else {
        require 'menu.php';
        $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

        switch ($request_uri[0]) {
            case '/':
                require 'home.php';
                break;
            case '/home':
                require 'home.php';
                break;
            case '/viagens':
                require 'viagens.php';
                break;
            case '/usuarios':
                require 'usuarios.php';
                break;
            case '/veiculos':
                require 'veiculos.php';
                break;
            default:
                echo "404";
                header('HTTP/1.0 404 Not Found');
                break;
        }
    }
    ?>
    <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="script.js"></script>
</body>
</html>