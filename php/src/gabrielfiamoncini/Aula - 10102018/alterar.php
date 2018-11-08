<?php
    include "conexao.php";

    if(isset($_POST['atualizar'])){
        $update = "update pessoa set 
                                 primeiro_nome = '{$_POST['primeiro_nome']}',
                                 segundo_nome = '{$_POST['segundo_nome']}',
                                 email = '{$_POST['email']}',
                                 cidade = '{$_POST['cidade']}',
                                 estado = '{$_POST['estado']}'                                 
                                 where id = {$_GET["id"]}"
                                 ;
        mysqli_query($conn,$update);    
    }
  
    $sql="select * from pessoa where id=".$_GET['id'];
    $result = mysqli_query($conn,$sql);
    $linha = mysqli_fetch_array($result);
?>

<a href="index.php">Voltar</a>
<hr>

<form method ="post">
    Primeiro Nome:
    <input type="text" name="primeiro_nome" value="<?=$linha['primeiro_nome'];?>">
    <br>
    <br>
    Segundo Nome:
    <input type="text" name="segundo_nome" value="<?=$linha['segundo_nome'];?>">
    <br>
    <br>
    E-mail:
    <input type="text" name="email" value="<?=$linha['email'];?>">
    <br>
    <br>
    Cidade:
    <input type="text" name="cidade" value="<?=$linha['cidade'];?>">
    <br>
    <br>
    UF:
    <input type="text" name="estado" value="<?=$linha['estado'];?>">
    <br>
    <br>
    <input type="submit" name="atualizar" value="Atualizar"> 

</form>