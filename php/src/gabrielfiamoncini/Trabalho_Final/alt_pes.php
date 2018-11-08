<?php
      session_start();
    
      if((!isset ($_SESSION['Login']) == true) and (!isset ($_SESSION['Senha']) == true))
  {
    unset($_SESSION['Login']);
    unset($_SESSION['Senha']);
    header('location:faz_login.php');
    }
   
  $logado = $_SESSION['Login'];
    include "conexao.php";
    if(isset($_POST['atualizar'])){
        $update = "update pessoas set 
                                 Nome = '{$_POST['nome']}',
                                 CpfCnpj = '{$_POST['cpfcnpj']}',
                                 Endereco = '{$_POST['endereco']}',
                                 Numero = '{$_POST['numero']}',
                                 Bairro = '{$_POST['bairro']}',                                 
                                 Cidade = '{$_POST['cidade']}',
                                 Estado = '{$_POST['estado']}',
                                 Pais = '{$_POST['pais']}'    
                                 where Id_Pessoa = {$_GET["Id_Pessoa"]}"
                                 ;
        mysqli_query($conn,$update);    
    }
  
    $sql="select * from pessoas where Id_Pessoa=".$_GET['Id_Pessoa'];
    $result = mysqli_query($conn,$sql);
    $linha = mysqli_fetch_array($result);
    
    if (mysqli_query($conn, $sql)) {
        echo "Sucesso";
    } else {
        echo "Erro";
    }
?>

<a href="menu.php">Voltar</a>
<hr>

<form method ="post">
    Nome:
    <input type="text" name="nome" value="<?=$linha['Nome'];?>">
    <br>
    <br>
    CpfCnpj:
    <input type="text" name="cpfcnpj" value="<?=$linha['CpfCnpj'];?>">
    <br>
    <br>
    Endereco:
    <input type="text" name="endereco" value="<?=$linha['Endereco'];?>">
    <br>
    <br>
    Numero:
    <input type="text" name="numero" value="<?=$linha['Numero'];?>">
    <br>
    <br>
    Bairro:
    <input type="text" name="bairro" value="<?=$linha['Bairro'];?>">
    <br>
    <br>
    Cidade:
    <input type="text" name="cidade" value="<?=$linha['Cidade'];?>">
    <br>
    <br>
    Estado:
    <input type="text" name="estado" value="<?=$linha['Estado'];?>">
    <br>
    <br>
    Pais:
    <input type="text" name="pais" value="<?=$linha['Pais'];?>">
    <br>
    <br>
    <input type="submit" name="atualizar" value="Atualizar"> 

</form>