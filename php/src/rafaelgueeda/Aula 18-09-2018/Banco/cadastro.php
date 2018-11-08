<a href="index.php">Tela Inicial</a>
<hr>

<?php
    include "conexao.php";
 
    if (isset($_POST["gravar"])) {
      
        $Pnome = $_POST["primeiro_nome"];
        $Snome = $_POST["segundo_nome"];
        $email = $_POST["email"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $idade = $_POST["idade"];
        $password = $_POST["password"];

          $query = "insert into pessoa (idade,password,primeiro_nome,segundo_nome,email,cidade,estado) 
          values ('{$idade}','{$password}','{$Pnome}','{$Snome}','{$email}','{$cidade}','{$estado}')";
                     if (mysqli_query($conn, $query)) {
            echo "Registro gravado com sucesso!";
        }
    }
?>

<form method="post">
    Primeiro Nome:
        <input type="text" name="primeiro_nome">
    <br>
     Segundo Nome:
        <input type="text" name="segundo_nome">
    <br>
    Idade:
        <input type="text" name="idade">
    <br>
    Email:
        <input type="text" name="email">
    <br>
    Password:
        <input type="text" name="password">
    <br>
    Cidade:
        <input type="text" name="cidade">
    <br>
    Estado:
        <input type="text" name="estado">
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>