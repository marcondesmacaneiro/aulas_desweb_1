<?php
    include "conexao.php";
    if (isset($_POST["gravar"])) {
        $nome = $_POST["primeiro_nome"];
        $sobrenome = $_POST["segundo_nome"];
        $email = $_POST["email"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $query = "insert into pessoa (primeiro_nome,segundo_nome,email,cidade,estado) values ('{$nome}','$sobrenome','$email','$cidade','$estado')";
        if (mysqli_query($conn, $query)) {
            echo "Registro gravado com sucesso!";
            ?>
                <br>
                <a href="cadastro.php">Cadastrar Pessoa.</a>
                <br>
                <a href="index.php">Voltar ao Menu Principal.</a>
            <?php
        exit();
        }
    }
?>
Cadastro de Pessoa:
<br>
<br>
<form method="post">
    Primeiro Nome:
    <br>
    <input type="text" name="primeiro nome">
    <br>
    Segundo Nome:
    <br>
    <input type="text" name="segundo_nome">
    <br>
    E-mail:
    <br>
    <input type="text" name="email">
    <br>
    Cidade:
    <br>
    <input type="text" name="cidade">
    <br>
    Estado:
    <br>
    <input type="text" name="estado">
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>