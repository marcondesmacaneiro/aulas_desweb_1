<!DOCTYPE html>
<html>
<head>
	<title>Adicionar saldo</title>
	
</head>
<body>
	<?php
	session_start();
	if (isset($_SESSION['username'])) {
        ?>
       

       <a href="listar_carro.php"> Voltar</a>
    <hr>

<?php
error_reporting(1);
    include "conexao.php";
    #var_dump($_POST);

    if(isset($_POST['alterar'])){
        $saldo = $_POST["saldo"];
        $query = "SELECT saldo FROM carro WHERE id = ".$_GET['id'];
        $result = mysqli_query($conn, $query);
        $linha = mysqli_fetch_array($result); 
        $saldoatual = $linha[saldo];
        $saldo = $saldoatual+$saldo;
        
        $query = "UPDATE carro SET 
                    saldo = '{$saldo}'
                     WHERE id = ".$_GET['id'];
        ?><br>
        <?php
        #echo $query;
        if ( mysqli_query($conn, $query)){
            
            ?>
                <a href="listar_carro.php">Saldo adicionado, clique para voltar</a>
            <?php
            exit();
        }
        
    }
    $query = "SELECT * FROM carro WHERE id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);
    $linha = mysqli_fetch_array($result);

    ?>

  <form method="post">
    Valor a adicionar:
    <br>
    <input type="text" name="saldo"  placeholder = "Valor a adicionar">
    
    <input type="submit" name="alterar" value="Adicionar">
    <br>
    

    </form>
    <?php
	}
	else {
		header('location: index.php');
	}
	?>
</body>
</html>