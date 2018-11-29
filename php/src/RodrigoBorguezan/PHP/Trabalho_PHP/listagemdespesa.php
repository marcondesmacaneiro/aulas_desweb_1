<a href="menu.php">Tela Inicial</a>
<br>
<a href="cadastrodespesa.php">Cadastrar Despesa</a>
<hr>
<?php
    include "conexao.php";

    $query = "select * from despesa";
    $result = mysqli_query($conn, $query);
       
?>


<table border="1">
    <tr>
        <td><b>Codigo</b></td>
        <td><b>Descricao</b></td>
        <td><b>Valor</b></td>
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?=$linha["iddespesa"]?></td>
                    <td><?=$linha["descricao"]?></td>
                    <td><?=$linha["valor"]?></td>
                    <td>
                        <a href="atualizardespesa.php?iddespesa=<?=$linha["iddespesa"]?>">Editar</a> 
                        <br>   
                        <a href="removedespesa.php?iddespesa=<?=$linha["iddespesa"]?>">Excluir</a>
                  </td>
                </tr>
            <?php
        }
    ?>
