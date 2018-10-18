<?php
    include "conexao.php";

    if(isset($_POST["deletar"])) {
        $sql = "delete from pessoa where id = ".$_GET['id'];
        mysqli_query($conn, $sql);
        echo "Registro removido com sucesso!";
        ?>
            <br>
            <a href="index.php">Voltar ao menu principal</a>
        <?php
        exit();
    };
?>
<a href="index.php">Voltar Para a Lista de Pessoas</a>
<hr>
<?php
    $query = "select * from pessoa where id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);

    $linha = mysqli_fetch_array($result);
?>
Dados da Pessoa a ser excluida!
<br>
<br>
Primeiro Nome: <?=$linha['primeiro_nome']?>
<br>
Segundo Nome: <?=$linha['segundo_nome']?>
<br>
E-mail: <?=$linha['email']?>
<br>
Cidade: <?=$linha['cidade']?>
<br>
Estado: <?=$linha['estado']?>
<br>
<br>
<form method="post">
    Deseja realmente excluir ?
    <br>
    <input type="submit" name="deletar" value = "Sim">
</form>