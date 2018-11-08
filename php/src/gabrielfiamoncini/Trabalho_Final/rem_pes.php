<?php
  include "conexao.php";

  if(isset($_POST["deletar"])){
      //echo "Excluir";
      $sql="delete from pessoas where Id_Pessoa =".$_GET['Id_Pessoa'];
      mysqli_query($conn,$sql);
      ?>
         <a href="lis_pes.php"> Cadastro Removido</a>
     <?php
     exit();
  }
?>

<a href="menu.php">Voltar</a>
<hr>
<?php
    include "conexao.php";
    $sql = "select * from pessoas where Id_Pessoa = ".$_GET['Id_Pessoa'];
    $query = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($query);
?>

Dados do Cliente.<br><br>

Nome: <?=$linha['Nome']?>
<br>
CfpCnpj: <?=$linha['CpfCnpj']?>
<br>
Endereco: <?=$linha['Endereco']?>
<br>
Numero: <?=$linha['Numero']?>
<br>
Bairro: <?=$linha['Bairro']?>
<br>
Cidade: <?=$linha['Cidade']?>
<br>
Estado: <?=$linha['Estado']?>
<br>
Pais: <?=$linha['Pais']?>
<br>
<form method="post">
    Deseja realmente deletar?
    <input type="submit" name="deletar" value="Sim">
</form>