<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
    $update = "update from pessoa
                set primero_nome = ''
                where id = {$_GET["id"]}"
                ;
    mysqli_query($conn, $update);
}

    $sql = "select * from pessoa where id =".$_GET['id'];
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado); 
?>

<a href="index.php">Voltar para a listagem</a>
<hr>

<form method="post";>
    Primeiro Nome:
    <input type="text" name="primeiro_nome" value="<?$linha['primeiro_nome']?>">

    <br>
    <input type="submit" name="atualizar" value="atualizar">
</form>