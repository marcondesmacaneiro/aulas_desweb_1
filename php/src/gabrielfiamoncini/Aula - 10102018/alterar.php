<?php
    include "conexao.php";
    $sql="select * from pessoa where id=".$_GET['id'];
    $result = mysqli_query($conn,$result);
?>

<form method="post">
    Primeiro Nome:
    <input type="text" name="primeiro_nome" value="">
    <br>
    <input type="submit" name="atualizar" value="Atualizar> 

</form>