<?php

    session_start();
    include "conexao.php";
    
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "Select Login from usuario where Login ='{$login}' and Senha='{$senha}'";
    $result =  mysqli_query($conn,$sql);
    
    if(isset($_POST["logar"])){
        if (mysqli_num_rows($result) == 1) {
            echo "Bem Vindo !";
            $_SESSION['Login'] = $login;
           $_SESSION['Senha'] = $senha;
            header('location:index.php');
            
        } else {
            echo'Dados Invalidos';        
        }
    }   
    
?>