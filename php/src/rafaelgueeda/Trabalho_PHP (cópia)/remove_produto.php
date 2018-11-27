<?php
    include "conexao.php";

    if(isset($_POST["deletar"])) {
        $sql = "delete from produto where codigo = ".$_GET['codigo'];
        mysqli_query($conn, $sql);
        ?>
            <a href="index.php">Produto removido com sucesso. Clique aqui para retornar a listagem.</a>
        <?php
        exit();
    }
?>

<a href="index.php">Voltar para a lista de Produtos</a>
<hr>
<?php
    $query = "select * from produto where codigo = ".$_GET['codigo'];
    $resultado = mysqli_query($conn, $query);

    $linha = mysqli_fetch_array($resultado);
?>

Dados da Produto.<br><br>

Codigo: <?=$linha['codigo']?>

<br>
Descricao: <?=$linha['descricao']?>

<br>
Preço de Venda: <?=$linha['precovenda']?>

<br>
<hr>
<form method="post">
    Deseja realmente deletar esse cadastro? 
    <input type="submit" name="deletar" value="Sim">
</form>