<?php
    include ('conexao.php');
    
    if (isset($_POST['atualizar'])){
        $update = "update pessoa
                    set primeiro_nome = '{$_POST['primeiro_nome']}'
                    where id = {$_GET['id']}";
        mysqli_query($conecta, $update);
    };
    
    
    $sql = "select * from pessoa where id =".$_GET['id'];
    $resultado = mysqli_query($conecta, $sql);
    $linha = mysqli_fetch_array($resultado);


?>
<a href="index.php">Voltar para listagem</a>

<form method="post">
    Primeiro nome:
    <input type="text" name="primeiro_nome" value="<?php echo $linha['primeiro_nome']?>">
    <br>
    <input type="submit" name="atualizar" value="atualiar">
</form>