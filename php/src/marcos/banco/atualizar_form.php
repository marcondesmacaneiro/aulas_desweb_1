<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
    $update = "update from pessoa 
                set primeiro_nome = '{$_POST['primeiro_nome']}'
                where id = {$_GET["id"]}
                 ";   
     Mysqli_query ($conn, $update);        
    
    }    
    
    $sql = "select  * from pessoa where id =". $_GET['id'];
    $resultado = Mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);



?>

<a href="index.php">voltar para a listagem?</a>
<hr>

<form method="post">
primeiro nome
<input type="text" name="primeiro_nome" value="<?=$linha['primeiro_nome'];?>">

<br>
<input type="submit" name="atualizar" value="atualizar">
</form>