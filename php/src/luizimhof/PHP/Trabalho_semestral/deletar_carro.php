<?php
    include 'conexao.php';
    if(isset($_POST['Deletar'])){
        $sql = 'DELETE FROM carro WHERE id = '.$_GET['id'];
        $result = mysqli_query($conn, $sql);
        ?>
            <a href="listar_carro.php">Carro removido, clique para voltar</a>
        <?php
        exit();
    }
?>


<a href="listar_carro.php"> Voltar</a>
<hr>

<?php
   
    $query = "select * from carro where id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);
    
    $linha = mysqli_fetch_array($result);
?>

Informações sobre o carro:
<br>
<br>
Placa: <?=$linha['placa']?>
<br>
Saldo: <?=$linha['saldo']?>
<br>
Cidade: <?=$linha['cidade']?>
<br>
Estado: <?=$linha['estado']?>
<br><br>
<form method="post">
Deseja deletar mesmo?
<input type="submit" name="Deletar" value="Sim">

</form>
