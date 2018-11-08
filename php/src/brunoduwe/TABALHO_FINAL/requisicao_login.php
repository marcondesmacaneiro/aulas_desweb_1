<?php

    include "conexao.php";
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $validacao = mysqli_query($conn, "select * from usuario where USUARIO= '$login' and SENHA = '$senha'");
?>
<?php
session_start();
    if(mysqli_num_rows($validacao)<=0){
        echo "<script language='javascript' type='text/javascript'>alert('Login e/ou Senha Incorretos!');window.location.href='index.php';</script>";
    }
    else{ 
        setcookie("login", $login);
        header('Location: principal.php');
    }
?>