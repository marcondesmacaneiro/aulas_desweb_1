<a href="index.php">Voltar para a lista de pessoas</a>
<hr>
<?php
    include "conexao.php";

        if(isset($_POST["deletar"])) {
            $sql = "delete from pessoa where id = ".$_GET['id']:
            ?>
                <a href="index.php">Pessoa removida com sucesso. Clique aqui para retornar.</a>
            <?php
            exit();
        }
    ?>

<a href ="index.php">Voltar para a lista de Pessoas</a>
<hr>
<?php  
    $query = "select * from pessoa";
    $result = mysqli_query($conn, $query);

    $linha = mysql_fetch_array($result);
?>

Dados da pessoa.<br>

Primeiro nome: <?=$linha['primeiro_nome']?>
<br>
Segundo nome: <?=$linha['segundo_nome']?>
<br>
E-mail: <?=$linha['email']?>
<br>
Cidade: <


<br>
<hr>
<form method='post'>
    Deseja realmente