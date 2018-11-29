<?php
    date_default_timezone_set('America/Sao_Paulo');
    include 'conexao.php';
   
?>


<a href="listar_carro.php"> Voltar</a>
<hr>

<?php
   
    $query = "select * from vaga where id = 
            (SELECT vaga_id from carro where id = ".$_GET['id'].")";
    //echo $query;
    $result = mysqli_query($conn, $query);
    $linha = mysqli_fetch_array($result);
    $vagaid = $linha["id"];
    $data = date('Y-m-d h:m:s');
    $t1 = StrToTime ( $linha["entrada"] );
    $t2 = StrToTime ( $data);
    $diff = $t2 - $t1;
    $hours = $diff / ( 60 * 60 );
    
    $hours = round($hours, 2);
    echo $hours;
    $valortotal = $linha["preco_hora"] * $hours ; 
    echo $valortotal;

?>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Carro</td>
        <td>Entrada</td>
        <td>Saida</td>
        <td>Preco por hora</td>
        <td>Valor total</td>
    </tr>
       <tr>
       <td><?=$linha["id"]?></td>
       <td><?=$linha["carro"]?></td>
       <td><?=$linha["entrada"]?></td>
       <td><?=$data?></td>
       <td><?=$linha["preco_hora"]?></td>
       <td><?=$valortotal?></td>
    </tr>
</table>
<form method="post">
Deseja remover o carro da vaga?
<input type="submit" name="Deletar" value="Sim">

</form>

<?php if(isset($_POST['Deletar'])){
       // echo $valortotal;
        atualizar_saldos($valortotal, $vagaid);
        $sql = 'UPDATE carro SET vaga_id = NULL WHERE id = '.$_GET['id'];
        $result = mysqli_query($conn, $sql);
        ?>
           <a href="listar_carro.php">Carro saiu do estacionamento, clique para voltar</a>
        <?php
        exit();
    }


function atualizar_saldos($valortotal, $vagaid){
    include 'conexao.php';
    $query = "select saldo from carro where id =".$_GET['id'];
    $result = mysqli_query($conn, $query);
    $linha = mysqli_fetch_array($result);
    $saldocarro = $linha["saldo"];
    $saldocarro = $saldocarro - $valortotal;
    
    $query = "select saldo from vaga where id =".$vagaid;
    $result = mysqli_query($conn, $query);
    $linha = mysqli_fetch_array($result);
    $saldovaga = $linha["saldo"];
    //echo $saldovaga;
    $saldovaga = $saldovaga + $valortotal;
    
    $query = "select estacionamento_id from vaga where id=".$vagaid;
    $result = mysqli_query($conn, $query);
    $linha = mysqli_fetch_array($result);
    $estacionamento = $linha["estacionamento_id"];
    

    $query = "select lucro from estacionamento where id =
                (select estacionamento_id from vaga where id=".$vagaid.")";
                
    $result = mysqli_query($conn, $query);
    $linha = mysqli_fetch_array($result);
    $lucro = $linha["lucro"];
    $lucro = $lucro + $valortotal;

    $query = "UPDATE carro SET 

                saldo = '{$saldocarro}'
                WHERE id = ".$_GET['id'];
    mysqli_query($conn, $query);

    $query = "UPDATE vaga SET 
                carro = null,
                entrada = null,
                livre = 1,
                saldo = '{$saldovaga}'
                WHERE id = ".$vagaid;
    mysqli_query($conn, $query);


    $query = "UPDATE estacionamento SET 
                lucro = '{$lucro}'
                WHERE id = ".$estacionamento;
    echo $query;
    mysqli_query($conn, $query);
    
    
}



?>


