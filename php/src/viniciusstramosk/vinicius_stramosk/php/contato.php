Contato:
dale dele dele doly
<hr>
<?php
    if($_POST["enviar"] == "Enivar"){
        echo "O nome é {$_POST[nome]}.";
    }
?>
<hr>
<form method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome"
    value="<?php echo $_POST[nome]; ?>">
    <br />

    <input type="submit" name="enviar" value="Enviar">
</form>