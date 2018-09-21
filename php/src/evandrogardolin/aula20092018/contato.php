<?php
    if($_POST["acao"] == "enviar"){
        echo "texto enviado foi {$_POST['txt']}";
    }
?>

<form method="post">
    <textarea name="txt"></textarea>
    <input type="submit" name="acao" value="enviar">
</form>