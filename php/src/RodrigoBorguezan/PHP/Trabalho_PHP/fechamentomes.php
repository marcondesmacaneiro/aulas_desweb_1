<a href="menu.php">Tela Inicial</a>

<hr>
<?php
    include "conexao.php";
  

    if (isset($_POST["gravar"])) {
        
        $data = $_POST["data"];
        $query1 = "select ((sum(valor))-(select sum(valor) from despesa)) as saldo from receita";
        $result1 = mysqli_query($conn, $query1);



        while ($linha = mysqli_fetch_array($result1)) {
            $valor = $linha["saldo"] ;
            
        }
        


        $query = "insert into fechamento (data,valor)
        values ('{$data}', '{$valor}' )";
       
                      if (mysqli_query($conn, $query)) {
            echo "Registro gravado com sucesso!";
        }else{
            echo "Não foi possivel gravar!";
        }
    }

    $query3 = "select * from fechamento order by idfechamento desc";
    $result2 = mysqli_query($conn, $query3);
?>
<form method="post">
    Descricao:    <input type="date" name="data">
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>

<table border="1">
    <tr>
        <td><b>Codigo</b></td>
        <td><b>data fechamento</b></td>
        <td><b>Valor</b></td>
    </tr>
    <?php
        while ($linha = mysqli_fetch_array($result2)) {
            ?>
                <tr>
                    <td><?=$linha["idfechamento"]?></td>
                    <td><?=$linha["data"]?></td>
                    <td><?=$linha["valor"]?></td>
                </tr>
            <?php
        }
    ?>