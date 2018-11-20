<?php
      session_start();
    
      if((!isset ($_SESSION['Login']) == true) and (!isset ($_SESSION['Senha']) == true))
  {
    unset($_SESSION['Login']);
    unset($_SESSION['Senha']);
    header('location:faz_login.php');
    }
   
  $logado = $_SESSION['Login'];
    include "conexao.php";
  if(isset($_POST['atualizar'])){
        $update = "update usuario set 
                                 Login = '{$_POST['login']}',
                                 Senha = '{$_POST['senha']}',
                                 Privilegio = '{$_POST['privilegio']}'
                                 where Id_User = {$_GET["Id_User"]}"
                                 ;
        mysqli_query($conn,$update);    

        ?>
        <h1>SUCESSO!</h1>
<a href="list_usu.php">Voltar</a>

        <?php
        exit();
    }
  
    $sql="select * from usuario where Id_User=".$_GET['Id_User'];
    $result = mysqli_query($conn,$sql);
    $linha = mysqli_fetch_array($result);
    
    
?>


<hr>

<form method ="post">
    Login:
    <input type="text" name="login" value="<?=$linha['Login'];?>">
    <br>
    <br>
    Senha:
    <input type="text" name="senha" value="<?=$linha['Senha'];?>">
    <br>
    <br>
    Privilegio:
    <input type="text" name="privilegio" value="<?=$linha['Privilegio'];?>">
    <input type="submit" name="atualizar" value="Atualizar"> 
</form>