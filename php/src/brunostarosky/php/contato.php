Entre 

<?php
    if ($_POST["enviar"]=="Enviar"){
        echo "O nome é {$_POST[nome]}.";
    }
?>

<form method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo $_POST[nome];?>">
    <br />
    <input type="submit" name="enviar" value="Enviar">
</form>
