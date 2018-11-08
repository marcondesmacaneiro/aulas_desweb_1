<?php
  session_start();
  unset($_SESSION['Login']);
  unset($_SESSION['Senha']);
  header('location:faz_login.php');
?>