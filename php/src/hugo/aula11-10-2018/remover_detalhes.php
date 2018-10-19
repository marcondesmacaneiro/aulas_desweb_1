<?php
    include "conexao.php";
    if(isset($_POST["deletar"])){
        $sql = " delete from pessoa where id = ".$_GET['id'];
        mysqli_query($conecta, $sql);
        ?>
            <a href="index.php">Pessoa removida com sucesso, clique aqui para voltar</a>
        <?php 
        exit();
    }
?>

<a href="index.php">Voltar para lista de pessoas</a>

<?php
       
       include "conexao.php";
       $query= "SELECT * FROM pessoa where id = ".$_GET['id'];
       $result= mysqli_query($conecta, $query);
       $linha = mysqli_fetch_array($result);
        
?>

Dados da pessoa. <br><br>

Primeiro nome: <?=$linha['primeiro_nome']?>
<br><br>
Segundo Nome: <?=$linha['segundo_nome']?>
<br><br>
E-mail: <?=$linha['email']?>
<br><br>
cidade: <?=$linha['cidade']?>
<br><br>
Estado: <?=$linha['estado']?>
<br><br>

<form method="post">
    Deseja deletar este cadastro?
    <input type="submit" name="deletar" value="sim">
</form>
