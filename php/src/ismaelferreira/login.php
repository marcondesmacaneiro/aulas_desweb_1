<?php

session_start();
$usuario["isma"] = "123";

if (isset($_POST["login"])) {
  $login = $_POST["login"];
  $senha = $_POST["senha"];
  if (isset($usuario[$login]) && ($usuario[$login] == $senha)) {
    $_SESSION["login"] = $login;
  }
}

if (!isset($_SESSION["login"])) {
?>
<html>
  <head>
    <title>Teste</title>
  </head>
  <body>
    <form method="POST">
      Nome: <input type="text" name="login"><br>
      Senha: <input type="password" name="senha">
      <input type="submit" value="OK">
    </form>
  </body>
</html>
<?php
  die();
}

?>