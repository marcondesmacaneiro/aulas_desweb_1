<a href="index.php">Tela Inicial</a>
<br><br>
<a href="cadastrarpedido.php">Novo Pedido</a>
<br>

<?php
    include "conexao.php";

    $query = "select * from pedido";
    $result = mysqli_query($conn, $query);
       
?>

<hr>

<table border="1">
    <tr>
        <td><b>Numero Pedido</b></td>
        <td><b>Codigo Cliente</b></td>     
        <td><b>Cliente</b></td>     
        <td><b>Data Lançamento</b></td>
        
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?=$linha["codigo"]?></td>
                    <td><?=$linha["pessoa_codigo"]?></td>
                    <td><?=$linha["pessoa"]?></td>
                    <td><?=$linha["data"]?></td>
                    <td>
                        <a href="cadastrarpedido.php?codigo=<?=$linha["codigo"]?>">Detalhar Pedido</a> 
                        
                  </td>
                </tr>
            <?php
        }
    ?>
