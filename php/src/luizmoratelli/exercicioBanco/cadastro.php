<?php
    require_once('conexao.php');

    if (isset($_POST['acao'])) {
        if ($_POST['acao'] == 'gravar') {
            $primeiroNome = '';
            if (isset($_POST['primeiro-nome'])) {
                $primeiroNome = $_POST['primeiro-nome'];
                $segundoNome = $_POST['segundo-nome'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $cidade = $_POST['cidade'];
                $estado = $_POST['estado'];
            }

            if ($primeiroNome) {
                $sql = "INSERT INTO pessoa (primeiro_nome, segundo_nome, email, password, cidade, estado)
                                    VALUES ('{$primeiroNome}', '{$segundoNome}', '{$email}', '{$password}', '{$cidade}', '{$estado}')";

                if (mysqli_query($conn, $sql)) {
                    echo "<span style='background-color: #27ae60; color: #ecf0f1; height: 10px; padding: 2px 5px;'>Pessoa {$primeiroNome} adicionada com sucesso!</span>";
                } else {
                    echo "<span style='background-color: #c0392b; color: #ecf0f1; height: 10px; padding: 2px 5px;'>Erro ao adicionar nova pesosa =(</span>";
                }
            } else {
                echo "<span style='background-color: #f39c12; color: #ecf0f1; height: 10px; padding: 2px 5px;'>Nenhum nome foi informado</span>";
            }
        }
    }
?>
<a href="listagem.php">listagem</a>
<hr>
<form method="POST">
    <label for="primeiro-nome">Primeiro Nome:</label>
    <input type="hidden" id="id" name="id" value="<?=((isset($_GET['id'])) ? $_GET['id'] : '0')?>">
    <input type="text" id="primeiro-nome" name="primeiro-nome">
    <input type="text" id="segundo-nome" name="segundo-nome">
    <input type="text" id="email" name="email">
    <input type="text" id="password" name="password">
    <input type="text" id="cidade" name="cidade">
    <input type="text" id="estado" name="estado">
    <input type="submit" name="acao" value="<?=((isset($_GET['id'])) ? 'atualizar' : 'gravar')?>">
</form>