<?php
    include "conexao.php";

    $query = "select * from pessoa";
    $trinta = "select * from pessoa where idade <=30 order by idade";
    $result = mysqli_query($conn, $query);
    $resulttrinta = mysqli_query($conn, $trinta);
    
?>

<a href="cadastro.php">Cadastrar</a>

<hr>

<table border="1">
    <tr>
        <td><b>ID</b></td>
        <td><b>Primeiro Nome</b></td>
        <td><b>Segundo Nome</b></td>
        <td><b>Idade</b></td>
        <td><b>E-mail</b></td>
        <td><b>Cidade</b></td>
        <td><b>Estado</b></td>
        <td><b>Ações</b></td>
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?=$linha["id"]?></td>
                    <td><?=$linha["primeiro_nome"]?></td>
                    <td><?=$linha["segundo_nome"]?></td>
                    <td><?=$linha["idade"]?></td>
                    <td><?=$linha["email"]?></td>
                    <td><?=$linha["cidade"]?></td>
                    <td><?=$linha["estado"]?></td>
                    <td>
                        <a href="atualizar_form.php?id=<?=$linha["id"]?>">Editar</a> 
                        <br>   
                        <a href="remover_detalhes.php?id=<?=$linha["id"]?>">Excluir</a>
                  </td>
                </tr>
            <?php
        }
    ?>
</table>

<hr>
<p> <b>Pessoas até 30 anos: </b>
<table border="1">
    <tr>
        <td><b>Nome</b></td>
        <td><b>Idade</b></td>
    </tr>
        <?php
             while ($linha = mysqli_fetch_array($resulttrinta)) {
            ?>
             <tr>
                <td><?=$linha["primeiro_nome"]?></td>
                <td><?=$linha["idade"]?> anos</td>
            </tr>
        <?php 
        }
        ?>
</table>
<hr>