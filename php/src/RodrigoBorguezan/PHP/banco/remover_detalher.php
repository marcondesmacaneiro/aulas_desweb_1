<?php
    include "conexao.php";

    if isset($_POST["deletar"]){
        $sql = ""delete from pessoa where id =".$_GET['id']";
        mysqli_query($conn,$sql);

        ?>
            <a href="index.php">Pessoa removida com sucesso. Clique aqui para voltar </a>
        <?php
        exit();

    }
?>
<a href="index.php"> Voltar para a lista de pessoas </a>
<hr>
<?php
    

    $query = "select * from pessoa where id =".$_GET('id');
    $result = mysqli_query($conn, $query);
    $linha = mysql_fetch_array($result);

?>


Dados da Pessoa.<br>

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

<form method="post">]
    Deseja realmente deletar esse cadastro?
    <input type="submit" name="delete" value="Sim">
</form>
