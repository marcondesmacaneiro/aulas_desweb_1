<?php
    require_once('conexao.php');

    if (isset($_POST['acao'])) {
        if ($_POST['acao'] == 'gravar') {
            $primeiroNome = '';
            if (isset($_POST['primeiro-nome'])) {
                $primeiroNome = $_POST['primeiro-nome'];
            }

            if ($primeiroNome) {
                $sql = "INSERT INTO pessoa (primeiro_nome)
                                    VALUES ('{$primeiroNome}')";

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
    <input type="submit" name="acao" value="<?=((isset($_GET['id'])) ? 'atualizar' : 'gravar')?>">
</form>