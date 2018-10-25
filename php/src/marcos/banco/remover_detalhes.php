<?php 
  include "conexao.php";
   

        if(isset($_POST["deletar"])) {
        $sql = "delete from pessoa where id = ". $_GET['id'];
        mysqli_query($conn, $sql);
        ?>
            <a href="index.php">pessoa removida com sucesso. clique aqui para retornar</a>
            <?php
            exit ();

            }
            ?>
    <a href="index.php">voltar para a lista de pessoas></a>
    <?php
    $query = "select * from pessoa where id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);
    
    $linha = mysqli_fetch_array($result);

    ?>

    dados da pessoa. <br>

    primeiro nome: <?=$linha['primeiro_nome']?>
    <br>
    segundo nome: <?=$linha['segundo_nome']?>
    <br>
    E-mail: <?$linha['E-mail']?>
    <br>
    cidade: <?=['cidade']?>
    <br>
    estado: <?=['estado']?>

    <form method="post">
    deseja mesmo deletar esse cadastro?
    <input type="submit" name="deletar" value="sim">
    </form>