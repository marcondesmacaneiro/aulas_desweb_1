<!DOCTYPE html>
<html>
<head>
	<title>Controlar estacionamento</title>
	
</head>
<body>
<?php
    include 'conexao.php';

    
    
?>

<a href="seguro.php"> Voltar</a>
    <hr>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Livres</td>
        <td>ocupadas</td>
        <td>Lucro</td>
    </tr>
    <?php
        $query = "select * from estacionamento";
        $result = mysqli_query($conn, $query);

        while ($linha = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?=$linha["id"]?></td>
            <td><?=$linha["vagas_livres"]?></td>
            <td><?=$linha["vagas_ocupadas"]?></td>
            <td><?=$linha["lucro"]?></td>
            
        </tr>
        <?php
        }
    ?>
</table>
<br><br><br>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Livre</td>
        <td>Carro</td>
        <td>Lucro</td>
    </tr>
    <?php
        $query = "select * from vaga";
        $result = mysqli_query($conn, $query);

        while ($linha = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?=$linha["id"]?></td>
            <td><?=$linha["livre"]?></td>
            <td><?=$linha["carro"]?></td>
            <td><?=$linha["saldo"]?></td>
            
        </tr>
        <?php
        }
    ?>

</table>

<br><br><br>

<a href="seguro.php">Voltar para o início</a>
<hr>

</body>