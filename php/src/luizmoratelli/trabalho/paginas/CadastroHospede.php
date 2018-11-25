<?php
if ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == 'localhost') {
    $diretorioSite = 'C:\xampp\htdocs\marcondes\aulas_desweb_1\php\src\luizmoratelli\trabalho';
    $linkSite = 'localhost/marcondes/aulas_desweb_1/php/src/luizmoratelli/trabalho';
}

require_once($diretorioSite.'/includes/conexao.php');
require_once($diretorioSite.'/includes/funcoes.php');
verificarLogado();
include_once($diretorioSite.'/includes/menu.php');

$mensagem = '';

if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao == 'gravar') {
        $nome = $_POST['nome'];
        $documento = $_POST['documento'];

        $sql = "
            INSERT INTO hospede (
                            nome,
                            documento
                        )
                        VALUES(
                            '$nome',
                            '$documento'
                        )";
        
        $retorno = @pg_affected_rows(executarComandoBanco($conn, $sql));

        if ($retorno > 0) {
            $mensagem = '<div class="success">Hóspede inserido com sucesso!</div>';
        } else {
            $mensagem = '<div class="error">Falha ao inserir novo hóspede!</div>';
        }
        
    } else if ($acao == 'atualizar') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $documento = $_POST['documento'];

        $sql = "
            UPDATE hospede 
               SET nome = $nome, 
                   documento = $documento
             WHERE id = $id";
        
        $retorno = @pg_affected_rows(executarComandoBanco($conn, $sql));

        if ($retorno > 0) {
            $mensagem = '<div class="success">Hóspede atualizado com sucesso!</div>';
        } else {
            $mensagem = '<div class="error">Falha ao atualizar hóspede!</div>';
        }
    }
}

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "
        SELECT *
          FROM hospede
         WHERE id = $id";

    $retorno = executarComandoBanco($conn, $sql);
    $linha = pg_fetch_array($retorno);
}

?>
<form method="POST">
    <?=$mensagem?>
    <input type="hidden" id="id" name="id" value="<?=((isset($_GET['id'])) ? $_GET['id'] : '0')?>">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?=((isset($linha['nome'])) ? $linha['nome'] : '')?>"><br/>
    <label for="documento">Documento:</label>
    <input type="text" id="documento" name="documento" value="<?=((isset($linha['documento'])) ? $linha['documento'] : '')?>"><br/>

    <input type="submit" name="acao" value="<?=((isset($_GET['id'])) ? 'atualizar' : 'gravar')?>">
</form>