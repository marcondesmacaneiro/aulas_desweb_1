<E-mail>gfiamoncini@unidavi.edu.br</E-mail>
<hr>
<?php
    print_r($_POST);
    if ($_POST["enviar"] == "Enviar") {
        echo "o Nome é: {$_POST[nome]}.";
    }
?>
<hr>
<form method="POST">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome" value="<?php echo $_POST[nome]; ?>">
    <br><br>
    <input type="submit" name="enviar" value="Enviar">
</form>