<?php
    include "conexao.php";
    if (isset($_POST['atualizar'])){
        $update = "update pessoa 
        set primeiro_nome = '{$_POST['primeiro_nome']}'
                where id = {$_GET['id']}";

        mysqli_query($conn, $update);
        echo '<script>alert("Registro atualizado")</script>';

        header('Location: index.php');
   
    }
  


    $sql = "select * from pessoa where id=".$_GET['id'];
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);
?>

<form method="post">
    Primeiro Nome:
    <input type="text" name="primeiro_nome" value="<?=$linha['primeiro_nome']?>">
    <br>
    <input type="submit" name="atualizar" value="ATUALIZAR">
</form>