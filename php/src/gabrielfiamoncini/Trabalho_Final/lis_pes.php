<?php
    include "conexao.php";
    $sql = 'select * from pessoas';
    $sql1 = 'delete from pessoas';
    $query = mysqli_query($conn, $sql);
?>

<table border="1">
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>CfpCnpj</td>
        <td>Endereco</td>
        <td>Numero</td>
        <td>Bairro</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Pais</td>
        <td>Acoes</td>
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($query)) {
            
    ?>
        <tr>
            <td><?= $linha["Id_Pessoa"] ?></td>
            <td><?= $linha["Nome"] ?></td>
            <td><?= $linha["CpfCnpj"] ?></td>
            <td><?= $linha["Endereco"] ?></td>
            <td><?= $linha["Numero"] ?></td>
            <td><?= $linha["Bairro"] ?></td>
            <td><?= $linha["Cidade"] ?></td>
            <td><?= $linha["Estado"] ?></td>
            <td><?= $linha["Pais"] ?></td>
            <td>
                <a href="rem_pes.php?Id_Pessoa=<?=$linha["Id_Pessoa"]?>">Remover</a>
                <br>
                <a href="alt_pes.php?Id_Pessoa=<?=$linha["Id_Pessoa"]?>">Alterar</a>            
            </td>
        </tr>            
    <?php
    
    if(isset($_POST["excluir"])){
        $sql1="delete from pessoas ";
        if (mysqli_query($conn, $sql1)) {
            echo "Sucesso";
        } else {
            echo "Erro";
        }
    }
    }
    ?>
    
</table>