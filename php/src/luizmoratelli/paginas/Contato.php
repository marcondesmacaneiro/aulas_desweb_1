<?php 
    if (isset($_POST['acao'])) {
        if ($_POST['acao'] == 'enviar') {
            echo "O nome informado é: {$_POST['nome']}";
        }
    }
?>

<form method="POST">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" value="<?php echo (isset($_POST['nome']) ? $_POST['nome'] : "") ?>">
    <br>
    <input type="submit" name="acao" value="enviar">
</form>