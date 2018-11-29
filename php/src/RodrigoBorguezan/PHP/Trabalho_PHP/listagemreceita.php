<a href="menu.php">Tela Inicial</a>
<br>
<a href="cadastroreceita.php">Cadastrar Receita</a>
<hr>
<?php
    include "conexao.php";

    $query = "select * from receita";
    $result = mysqli_query($conn, $query);
       
?>

<hr>

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
                    <td><?=$linha["idreceita"]?></td>
                    <td><?=$linha["descricao"]?></td>
                    <td><?=$linha["valor"]?></td>
                    <td>
                        <a href="atualizarreceita.php?idreceita=<?=$linha["idreceita"]?>">Editar</a> 
                        <br>   
                        <a href="removedespesa.php?idreceita=<?=$linha["idreceita"]?>">Excluir</a>
                  </td>
                </tr>
            <?php
        }
    ?>
