<a href="seguro.php"> Voltar</a>
<hr>

<?php
    include "conexao.php";

    if(isset($_POST["gravar"])){
        #echo "gravar o registro";
        $placa = $_POST["placa"];
        $saldo = $_POST["saldo"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        //echo $nome;
        $query = "INSERT INTO carro (placa, saldo,  cidade, estado) 
                    VALUES ('{$placa}','{$saldo}','{$cidade}','{$estado}')";
        if ( mysqli_query($conn, $query)){
            echo "registro gravado com sucesso";
        }
    }

?>


<form method="post">
    Placa:
    <br>
    <input type="text" name="placa">
    <br>
    Saldo:
    <br>
    <input type="decimal" name="saldo">
    <br>
    Cidade:
    <br>
    <input type="text" name="cidade">
    <br>
    Estado:
    <br>
    <input type="text" name="estado">
    <br>

    <input type="submit" name="gravar" value="Gravar">
    <br>
</form>