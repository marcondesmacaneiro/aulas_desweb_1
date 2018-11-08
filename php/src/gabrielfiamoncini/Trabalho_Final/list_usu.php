<?php
    session_start();
    
    if((!isset ($_SESSION['Login']) == true) and (!isset ($_SESSION['Senha']) == true))
{
  unset($_SESSION['Login']);
  unset($_SESSION['Senha']);
  header('location:faz_login.php');
  }
 
$logado = $_SESSION['Login'];
?>

<a href="index.php">Voltar</a>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Login</td>
        <td>Senha</td>
        <td>Privilerio</td>
        <td>Acoes</td>
    </tr>
    <?php
         include "conexao.php";
         $sql = 'select * from usuario';
         $sql1 = 'delete from usuario';
         $query = mysqli_query($conn, $sql);

        while ($linha = mysqli_fetch_array($query)) {
            
    ?>
        <tr>
            <td><?= $linha["Id_User"] ?></td>
            <td><?= $linha["Login"] ?></td>
            <td><?= $linha["Senha"] ?></td>
            <td><?= $linha["Privilegio"] ?></td>
            <td>
                <a href="rem_usu.php?Id_User=<?=$linha["Id_User"]?>">Remover</a>
                <br>
                <a href="alt_usu.php?Id_User=<?=$linha["Id_User"]?>">Alterar</a>            
            </td>
        </tr> 
        <br>      
    <?php
        } 
   if(isset($_POST["excluir"])){
        $sql1="delete from usuario ";
        if (mysqli_query($conn, $sql1)) {
           // echo "Sucesso";
        } else {
            //echo "Erro";
        }
    }
    ?>
    
</table>