<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
        $update = "update pessoa 
                    set primeiro_nome = '{$_POST['primeiro_nome']}'
                    segundo_nome = '{$_POST[segundo_nome'
                    where id = {$_GET["id"]}
                    ";
        mysqli_query($conn, $update);
    }
    
    $sql = "select * from pessoa where id =".$_GET['id'];
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);
?>

<a href="index.php">Voltar para a Listagem</a>
<hr>

<form method="post">
    Primeiro Nome:
    <input type="text" name="primeiro_nome" 
    value="<?=$linha['primeiro_nome']?>">
    <br>
    segundo_Nome:
    <input type="text" name="primeiro_nome" 
    value="<?=$linha['segundo_nome']?>">


    <br>
    <input type="submit" name="atualizar" value="atualizar">
</form>