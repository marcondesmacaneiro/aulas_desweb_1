<?php
print_r($_POST);
if($_POST["enviar"] == "Enviar") {
    echo "o nome {$_POST[nome]}.";

}

?>

<form method="POST">
<label for="nome">Nome</label>
<input type="text" name="nome" id="nome" value="<?php echo $_POST[nome]; ?>">
<br>
<input type="submit" name="enviar" value="Enviar">
</form>