<?php
    include "conexao.php";

    if(isset($_POST["delete"])) {
      $sql = "delete from pessoa where id =".$_GET['id']; 
      mysqli_query($conn, $sql);
      ?>
        <a href="index.php">Pessoa removida com sucesso. Clique aqui voltar a página principal;
      <?php
      exit();     

    }

?>




<a href="index.php"> Voltar para a página a lista de Pessoas</a>
<hr>
<?php
    include "conexao.php";

    $query = "select * from pessoa where id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);

    $linha = mysqli_fetch_array($result);
?>

Dados da pessoa.<br><br>

Primeiro Nome : <?=$linha['primeiro_nome']?>
<br>

Segundo Nome: <?=$linha['segundo_nome']?>
<br>

E-mail: <?=$linha['email']?>
<br>

Cidade: <?=$linha['cidade']?>
<br>

Estado: <?=$linha['estado']?>
<hr>
<form method="post">
    Deseja realmente deletar esse cadastro?
  <input type= "submit" name="delete" value="Sim">
</form>  
