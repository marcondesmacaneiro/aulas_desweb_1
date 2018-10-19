<?php
    include 'conexao.php';
    if(isset($_POST['Deletar'])){
        $sql = 'DELETE FROM pessoa WHERE id = '.$_GET['id'];
        $result = mysqli_query($conn, $sql);
        ?>
            <a href="banco.php">Pessoa removida, clique para voltar</a>
        <?php
        exit();
    }
?>


<a href="banco.php"> Voltar</a>
<hr>

<?php
   
    $query = "select * from pessoa where id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);
    
    $linha = mysqli_fetch_array($result);
?>

Dados da pesoa:
<br>
<br>
Primeiro nome: <?=$linha['primeiro_nome']?>
<br>
Segundo nome: <?=$linha['segundo_nome']?>
<br>
Email: <?=$linha['email']?>
<br>
Cidade: <?=$linha['cidade']?>
<br>
Estado: <?=$linha['estado']?>
<br><br>
<form method="post">
Deseja deletar mesmo?
<input type="submit" name="Deletar" value="Sim">

</form>
