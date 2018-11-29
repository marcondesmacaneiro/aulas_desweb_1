<?php 
  include 'conexao.php';
  
  $login = $_POST['login'];
  $entrar = $_POST['entrar'];
  $senha = md5($_POST['senha']);
  
    if (isset($entrar)) {
      $query_select = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'" ;          
      $select = mysqli_query($conn,$query_select) or die("erro ao selecionar");
        if (mysqli_num_rows($select)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
          die();
        }else{
          setcookie("login",$login);
          header("Location:index.php");
        }
    }
?>