<!DOCTYPE html>
<html>
<head>
	<title>SISTEMA DE CONTROLE DE ESTACIONAMENTO</title>
	
</head>
<body>
	<?php
	session_start();
	if (isset($_SESSION['username'])) {
        echo "<div class='loginbox'>Bem vindo ".$_SESSION['username']."</div>";
        echo "O que deseja fazer?";
        ?>
       <br><br>
        <a href="listar_carro.php">Verificar carros</a>
        
    <?php

	}
	else {
		header('location: index.php');
	}
	?>
</body>
</html>