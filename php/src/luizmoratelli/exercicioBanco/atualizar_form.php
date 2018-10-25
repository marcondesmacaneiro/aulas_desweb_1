<?php
require_once('conexao.php');

if (isset($_POST['acao'])) {
    if ($_POST['acao'] = 'atualizar') {
        $sql = "UPDATE pessoa   
                   SET primeiro_nome = '{$_POST['primeiro-nome']}'
                 WHERE id = {$_POST['id']}";
        $query = mysqli_query($conn, $sql); 
    }
}

$sql = "SELECT *
          FROM pessoa
         WHERE id = {$_GET['id']}";
$query = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($query);

?>
<a href="listagem.php">listagem</a>
<hr>
<form method="POST">
    <label for="primeiro-nome">Primeiro Nome:</label>
    <input type="hidden" id="id" name="id" value="<?=$linha['id']?>">
    <input type="text" id="primeiro-nome" name="primeiro-nome" value="<?=$linha['primeiro_nome']?>">
    <input type="submit" name="acao" value="atualizar">
</form>