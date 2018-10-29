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

          $query = "insert into pessoa (primeiro_nome,segundo_nome,email,cidade,estado) values 
                  ('{$Pnome}','{$Snome}','{$email}','{$cidade}','{$estado}')";
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
    Email:
        <input type="text" name="email">
    <br>
    Cidade:
        <input type="text" name="cidade">
    <br>
    Estado:
        <input type="text" name="estado">
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>