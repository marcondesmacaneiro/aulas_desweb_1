<?
  include "conexao.php";

  if(isset($_POST["deletar"])){
      //echo "Excluir";
      $sql="delete from pessoa where id =".$_GET['id'];
      mysqli_query($conn,$sql);
      ?>
        <a href="index.php"> Pessoa Removida. Quiue para voltar</a>
     <?php
     exit();
  };
?>

<a href="index.php">Voltar</a>
<hr>
<?php
    include "conexao.php";
    $sql = "select * from pessoa where id = ".$_GET['id'];
    $query = mysqli_query($conn, $sql);

    $linha = mysqli_fetch_array($query);
?>

Dados da pessoa.<br><br>

Primeiro Nome: <?=$linha['primeiro_nome']?>
<br>
Segundo Nome: <?=$linha['primeiro_nome']?>
<br>
E-Mail: <?=$linha['email']?>
<br>
Cidade: <?=$linha['cidade']?>
<br>
Estado: <?=$linha['estado']?>

<form method="post">
    Deseja realmente deletar?
    <input type="submit" name="deletar" value="Sim">
</form>