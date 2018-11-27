<a href="listar_carro.php"> Voltar</a>
<hr>

<?php
error_reporting(1);
    include "conexao.php";
    #var_dump($_POST);

    if(isset($_POST['alterar'])){
        $placa = $_POST["placa"];
        $saldo = $_POST["saldo"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        //echo $placa;
        $query = "UPDATE carro SET 
                    placa = '{$placa}', saldo = '{$saldo}'
                    , email = '{$email}', cidade = '{$cidade}', estado = '{$estado}' WHERE id = ".$_GET['id'];
        ?><br>
        <?php
        #echo $query;
        if ( mysqli_query($conn, $query)){
            
            ?>
                <a href="listar_carro.php">carro alterado, clique para voltar</a>
            <?php
            #exit();
        }
        
    }
    $query = "SELECT * FROM carro WHERE id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);
    $linha = mysqli_fetch_array($result);

?>

  <form method="post">
    Placa:
    <br>
    <input type="text" name="placa" value="<?=$linha[placa] ?>"placeholder = "Placa">
    <br>
    Saldo:
    <br>
    <input type="text" name="saldo" value="<?=$linha[saldo] ?>" placeholder = "Saldo">
    <br>
    Cidade:
    <br>
    <input type="text" name="cidade" value="<?=$linha[cidade] ?>" placeholder = "Cidade">
    <br>
    Estado:
    <br>
    <input type="text" name="estado" value="<?=$linha[estado] ?>" placeholder = "Estado">
    <br>

    <input type="submit" name="alterar" value="Alterar">
    <br>
    

</form>