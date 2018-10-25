<?
  if ($_POST["acao"]=="Enviar")
  echo "texto enviado foi".$_POST["txt"];
?>

<form method="POST">
    <textarea name="txt"></textarea>
    <input type="submit" name="acao" value="enviar">
</form>

<?php
  if ($_GET["gravar"]){
    setcookie("meu-cookie","valor", time() + 86400, "/")
    echo "cookie gravado";
  }
  print_r($_COOKIE)

  