<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
        $update = "update pessoa 
                    set primeiro_nome = '{$_POST['primeiro_nome']}',
                        segundo_nome = '{$_POST['segundo_nome']}',
                        idade = '{$_POST['idade']}',
                        email = '{$_POST['email']}',
                        password ='{$_POST['password']}',
                        cidade = '{$_POST['cidade']}',
                        estado = '{$_POST['estado']}'
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
    </br>
    Segundo Nome:
        <input type="text" name="segundo_nome" 
        value="<?=$linha['segundo_nome']?>">
    </br>
    Idade:
        <input type="text" name="idade" 
        value="<?=$linha['idade']?>">
    </br>
    Email:
        <input type="text" name="email" 
        value="<?=$linha['email']?>">
     </br>
     Senha:
        <input type="text" name="password" 
        value="<?=$linha['password']?>">
    </br>
     Cidade:
        <input type="text" name="cidade" 
        value="<?=$linha['cidade']?>">
    </br>
    Estado:
        <input type="text" name="estado" 
        value="<?=$linha['estado']?>">

    <br>
    <input type="submit" name="atualizar" value="atualizar">
</form>