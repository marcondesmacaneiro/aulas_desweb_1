<?php

session_start();

$sUser  = $_POST['user'];
$sSenha = $_POST['senha'];

if($sUser == 'caue' && $sSenha == 'foda123'){
    echo '<script>
            alert("Seja bem vindo ' . $_SESSION['login'] . $sUser . '");
          </script>';
}
else{
    echo '<script>
            alert("Login ou Senha inválido");
            window.location.assign("index.php");
          </script>';    
}

session_destroy();

