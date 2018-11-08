<?php
    include "conexao.php";
    $sql = 'select * from pessoa';
    $sql1 = 'delete from pessoa';
    $query = mysqli_query($conn, $sql);
?>
<a href="cadastro.php">Cadastrar</a>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Primeiro Nome</td>
        <td>Segundo Nome</td>
        <td>E-mail</td>
        <td>Senha</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Ações</td>
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($query)) {
               //echo  $linha['primeiro_nome'].'<br>';
    ?>
        <tr>
            <td><?= $linha["id"] ?></td>
            <td><?= $linha["primeiro_nome"] ?></td>
            <td><?= $linha["segundo_nome"] ?></td>
            <td><?= $linha["email"] ?></td>
            <td><?= $linha["password"] ?></td>
            <td><?= $linha["cidade"] ?></td>
            <td><?= $linha["estado"] ?></td>
            <td>
                <a href="remover.php?id=<?=$linha["id"]?>">Remover</a>
                <br>
                <a href="alterar.php?id=<?=$linha["id"]?>">Alterar</a>            
            </td>
        </tr>            
    <?php
    
    if(isset($_POST["excluir"])){
        $sql1="delete from pessoa ";
        if (mysqli_query($conn, $sql1)) {
            echo "Sucesso";
        } else {
            echo "Erro";
        }
    } 

    } 
    
    
    ?>
    
</table>