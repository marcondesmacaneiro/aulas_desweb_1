<?php
    
    include "includes/conexao.php";

    // $query = "select * from pessoa";
    // $result = mysqli_query($conn, $query);

    // while ($linha = mysqli_fetch_array($result)){
    //     echo "Linha {$linha[primeiro_nome]}<br/>";
    //     flush();
    //     sleep(3);
    // }


?>

<form method="post">
    PRIMEIRO NOME: <BR>
    <input type="text" name="primeiro_nome">
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>

<?php
    var_dump($_POST);

    if (!isset($_POST["gravar"])){
        echo "o registro nao foi gravado";
    } else {
        echo "o registro foi gravado";
    }
?>