<?php
    include ('conexao.php');

    if(isset($_POST["deletar"])) {
        $sql = "delete from pessoa where id = ".$_GET['id'];
        mysqli_query($conn, $sql);
        ?>
            <a href="index.php">Pessoa removida com sucesso. Clique aqui para voltar</a>
        <?php
        exit();
    }
    ?>

    <a href="index.php">Voltar para a lista de pessoas</a>
    <hr>
    <?php
        $query = "select * from pessoa where id  = ".$_GET['id'];
        $result = mysqli_query($conn, $query);

        $linha = mysqli_fetch_array($result);
?>

Dados da pessoa. <br><br>

Primeiro nome: <?=$linha['primeiro_nome']?>

<br>
Segundo nome: <?=$linha['segundo_nome']?>

<br>
E-mail: <?=$linha['email']?>

<br>
Cidade: <?=$linha['cidade']?>

<br>
Estado: <?=$linha['estado']?>

<form method="post">
    Deseja realmente deletar este cadastro?
    <input type="submit" name="deletar" value="sim">
</form>

