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

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
    $id = $_GET['id'];

    if ($acao == 'excluir') {
        $sql = "
            DELETE FROM hospede
             WHERE id = $id";
        
        $retorno = @pg_affected_rows(executarComandoBanco($conn, $sql));

        if ($retorno > 0) {
            $mensagem = '<div class="success">Hóspede excluido com sucesso!</div>';
        } else {
            $mensagem = '<div class="error">Falha ao excluir hóspede!</div>';
        }
    }
}

$sql = "
SELECT *
  FROM hospede";

$retorno = executarComandoBanco($conn, $sql);
?>
<?=$mensagem?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Documento</th>
        <th>Ações</th>
    </tr>
<?php
while ($linha = pg_fetch_array($retorno)):
?>
    <tr>
        <td><?=$linha['id']?></td>
        <td><?=$linha['nome']?></td>
        <td><?=$linha['documento']?></td>
        <td>
            <a href="?url=listagemHospede&acao=excluir&id=<?=$linha['id']?>">Excluir</a>
            <a href="?url=cadastroHospede&id=<?=$linha['id']?>">Atualizar</a>
        </td>
    </tr>
<?php
endwhile;
?>
</table>