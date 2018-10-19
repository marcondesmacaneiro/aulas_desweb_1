<?php
   
        include "conexao.php";

        if(isset($_POST["deletar"])) {
            $sql = "delete from pessoa where id = ". $_GET['id'];
            mysqli_query($conn, $sql);
            ?>
                <a href="index.php">pessoa removida com sucesso. Clique aqui para voltar</a>
            <?php
            exit();
        }
?>
    <a href="index.php"> voltar para lista de pessoas</a>
    <hr>
    <?php
    $query = "select * from pessoa where id = ". $_GET['id'];
    $result = mysqli_query($conn, $query);

    $linha = mysqli_fetch_array($result);

?>

Dados da pessoa.<br><br>

primeiro nome: <?=$linha['primeiro_nome']?>
<br>
segundo nome: <?=$linha['segundo_nome']?>
<br>
e-mail: <?=$linha['e-mail']?>
<br>
cidade: <?=$linha['cidade']?>
<br>
estado: <?=$linha['estado']?>

<form method="post">
    deseja realmente deletar esse cadastro?
    <input type="submit" name="deletar" value="sim">
</form>