<?php  
    include "conexao.php";

    if (isset($_POST['atualizar'])) {

        $update = "update pessoa 
                   set  primeiro_nome = '{$_POST['primeiro_nome']}'
                        segundo nome ='{$_POST['segundo_nome']}'
                        email = '{$_POST['email']}'
                        cidade = '{$_POST['cidade']}'
                        estado = '{$_POST['estado']}'
                   where id = {$_GET["id"]}
                   ";
        mysqli_query($conn, $update);
    }

    $sql = "select * from pessoa where id".$GET['id'];
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);
?>

<a href="index.php">Voltar para a listagem</a>
<hr>

<form method="post">
    Primeiro nome:
    <input type="text" name="primeiro_nome" 
    value="<?=$linha['primeiro_nome']?>">
    <br>

    Segundo nome:
    <input type="text" name="segundo_nome"
    value="<?=$linha['segundo_nome']?>">
    <br>

    Email:
    <input type="text" name="email"
    value="<?=$linha['email']?>">
    <br>

    Cidade:
    <input type="text" name="cidade"
    value="<?=$linha['cidade']?>">
    <br>

    Estado:
    <input type="text" name="estado"
    value="<?$linha['estado']?>">
    <br>

    <input type="submit" name="atualizar" value="atualizar">
</form>