<!DOCTYPE html>
<html>
<head>
	<title>Estacionar</title>
	
</head>
<body>
	<?php
    date_default_timezone_set('America/Sao_Paulo');
     include 'conexao.php';
	session_start();
	if (isset($_SESSION['username'])) {
        ?>
       
       <a href="listar_carro.php"> Voltar</a>
    <hr>

    

<?php

if(isset($_POST['alterar'])){
    $vaga = $_POST["vaga"];
    

    $query = "SELECT placa FROM carro WHERE id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);
    $placa = mysqli_fetch_array($result);
  
    $query = "UPDATE carro SET 
                    vaga_id = '{$vaga[0]}'
                     WHERE id = ".$_GET['id'];
        ?><br>
        <?php
        //echo $query;
        if ( mysqli_query($conn, $query)){
            $data = date('Y-m-d h:m:s');
            $query = "UPDATE vaga SET 
                    livre = 0, entrada = '{$data}', carro = '{$placa["placa"]}'
                     WHERE id = ".$vaga[0];

           
            if ( mysqli_query($conn, $query)){
                
                ?>
                    <a href="listar_carro.php">Carro estacionado, clique para voltar</a>
                <?php
                exit();
            }
            
        }

    
}



?>

    
  <form method="post">
    <?php
    $query = "select * from vaga where livre = 1";
    $result = mysqli_query($conn, $query); 
        while ($linha = mysqli_fetch_array($result)) {
            echo "<input type='radio' id='".$linha['id']."' name='vaga[]' value='".$linha['id']."'>";
            echo "<label for=".$linha['id'].">Vaga numero ".$linha['id']."/Valor por hora: ".$linha['preco_hora']."</label> ";
            

            echo "<br>";

        }
        
    ?>
    <input type="submit" name="alterar" value="Estacionar">
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