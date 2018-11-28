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
            DELETE FROM apartamento
             WHERE id = $id";
        
        $retorno = @pg_affected_rows(executarComandoBanco($conn, $sql));

        if ($retorno > 0) {
            $mensagem = '<div class="success">Apartamento excluido com sucesso!</div>';
        } else {
            $mensagem = '<div class="error">Falha ao excluir apartamento!</div>';
        }
    }
}

$sql = "
    SELECT *
      FROM apartamento";

$retorno = executarComandoBanco($conn, $sql);
?>
<main>
    <h1>Listagem de Apartamentos</h1>
    <?=$mensagem?>
    <table>
        <tr>
            <th>ID</th>
            <th>Número Quarto</th>
            <th>Qtd. Camas de Solteiro</th>
            <th>Qtd. Camas de Casal</th>
            <th>Qtd. Banheiros</th>
            <th>Qtd. Ares condicionados</th>
            <th>Qtd. Televisão</th>
            <th>Preço Diária</th>
            <th>Ações</th>
        </tr>
    <?php
    while ($linha = pg_fetch_array($retorno)):
    ?>
        <tr>
            <td><?=$linha['id']?></td>
            <td><?=$linha['numero_quarto']?></td>
            <td><?=$linha['qtd_cama_solteiro']?></td>
            <td><?=$linha['qtd_cama_casal']?></td>
            <td><?=$linha['qtd_banheiro']?></td>
            <td><?=$linha['qtd_ar_condicionado']?></td>
            <td><?=$linha['qtd_televisao']?></td>
            <td>R$ <?=number_format($linha['preco_diaria'], 2, ',', '.');?></td>
            <td>
                <a href="?url=listagemApartamento&acao=excluir&id=<?=$linha['id']?>">Excluir</a>
                <a href="?url=cadastroApartamento&id=<?=$linha['id']?>">Atualizar</a>
            </td>
        </tr>
    <?php
    endwhile;
    ?>
    </table>
</main>