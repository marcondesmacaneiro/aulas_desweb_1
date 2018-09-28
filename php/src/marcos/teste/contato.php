entre em contato com Marcos
marcos.cascaes23@unidavi.edu.br
<br>
<?php
if ($_POST["enviar"] == "enviar") {
    echo "o nome é ($_POST[nome]). ";
}
?>
<hr>
<form method="post">
    <label for="nome">nome</label>
    <input type="text" name="nome" id="nome"
    value="<?php echo $_POST[nome]; ?>">
    <br \>
    <input type="submit" name= "enviar" value= "enviar">
</form>