<?php 
require_once('conexao.php');

if (isset($_POST['deletar']) && isset($_POST['id'])) {
    $sql = "delete from pessoa where id = {$_GET['id']}";
    mysqli_query($conn, $sql);
    ?>
        <a href="listagem.php">Pessoa removida com sucesso, retorne à listagem</a>
    <?php
    exit();
}

$sql = "select * from pessoa where id = {$_GET['id']}";
$query = mysqli_query($conn, $sql);

$linha = mysqli_fetch_array($query);

?>
<a href="listagem.php">listagem</a>
<hr>
Dados da Pessoa.<br><br>
Primeiro Nome: <?=$linha['primeiro_nome']?><br>
Segundo Nome: <?=$linha['segundo_nome']?><br>
E-mail: <?=$linha['email']?><br>
Cidade: <?=$linha['cidade']?><br>
Estado: <?=$linha['estado']?><br>

<form method="post">
    Você tem certeza que deseja deletar esse cadastro?
    <input type="hidden" name="id" value="<?=((isset($_GET['id'])) ? $_GET['id'] : '0')?>">
    <input type="submit" name="deletar" value="sim">
</form>