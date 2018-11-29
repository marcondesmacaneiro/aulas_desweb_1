<!DOCTYPE html>
<html>
<head>
	<title>Controlar carros</title>
	
</head>
<body>
<?php
    include 'conexao.php';

    $query = "select * from carro";
    $result = mysqli_query($conn, $query);
    
?>

<a href="seguro.php"> Voltar</a>
    <hr>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Placa</td>
        <td>Saldo</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Ações</td>
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?=$linha["id"]?></td>
            <td><?=$linha["placa"]?></td>
            <td><?=$linha["saldo"]?></td>
            <td><?=$linha["cidade"]?></td>
            <td><?=$linha["estado"]?></td>
            <td>
                <a href = "deletar_carro.php?id=<?=$linha["id"]?>">Remover</a>
                <br>
                <a href = "atualizar_carro.php?id=<?=$linha["id"]?>">Atualizar</a>
                <br>
                <a href = "adicionar_saldo.php?id=<?=$linha["id"]?>">Adicionar saldo</a>
                <br>
                <?php 
                if($linha["vaga_id"] === NULL){?>
                    <a href = "estacionar_carro.php?id=<?=$linha["id"]?>">Estacionar o carro</a>
                    <?php
                }
                else{
                    ?>
                    <a href = "sair_carro.php?id=<?=$linha["id"]?>">Sair do estacionamento</a>
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php
        }
    ?>
</table>
<br><br><br>
<a href="cadastro_carro.php">Adicionar um cadastro de carro</a>
<hr>

</body>