<?php
    include "conexao.php";

    if(isset($_POST["deletar"])) {
        $sql = "delete from despesa where iddespesa = ".$_GET['iddespesa'];
        mysqli_query($conn, $sql);
        ?>
            <a href="menu.php">Despesa removida com sucesso. Clique aqui para retornar a listagem.</a>
        <?php
        exit();
    }
?>

<a href="menu.php">Voltar para a lista de Despesa</a>
<hr>
<?php
    $query = "select * from despesa where iddespesa = ".$_GET['iddespesa'];
    $resultado = mysqli_query($conn, $query);

    $linha = mysqli_fetch_array($resultado);
?>

Dados da Despesa.<br><br>

Codigo: <?=$linha['iddespesa']?>

<br>
Descricao: <?=$linha['descricao']?>

<br>
Valor: <?=$linha['valor']?>

<br>
<hr>
<form method="post">
    Deseja realmente deletar esse cadastro? 
    <input type="submit" name="deletar" value="Sim">
</form>