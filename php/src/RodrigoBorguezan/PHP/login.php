<?php 
    session_start();
   // $login = $_POST['login'];
 //   $senha = $_POST['senha'];
    if($login = 'rodrigo.borguezan' and $senha = '123456' ){
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
     //   echo "Login realizado com sucesso: {$_POST['login']}";
    }
    else{
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        echo "Login errado: {$_POST['login']}";    
    
    }
?>

<form method="post" action="RealizadocomSucesso.php" id="formlogin" name="formlogin" >
    <fieldset id="fie">
        <legend>LOGIN</legend><br />
        <label>NOME : </label>
        <input type="text" name="login" id="login"  /><br />
        <label>SENHA :</label>
        <input type="password" name="senha" id="senha" /><br />
        <input type="submit" value="Entrar  "  />
    </fieldset>
</form>

