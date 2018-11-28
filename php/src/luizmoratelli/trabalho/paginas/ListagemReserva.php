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
            DELETE FROM reserva
             WHERE id = $id";
        
        $retorno = @pg_affected_rows(executarComandoBanco($conn, $sql));

        if ($retorno > 0) {
            $mensagem = '<div class="success">Reserva excluida com sucesso!</div>';
        } else {
            $mensagem = '<div class="error">Falha ao excluir reserva!</div>';
        }
    }
}

$sql = "
      SELECT reserva.id AS res_id, documento, numero_quarto, data_aluguel, nome
        FROM reserva
        JOIN hospede
          ON reserva.hos_id = hospede.id
        JOIN apartamento
          ON reserva.apt_id = apartamento.id
    ORDER BY data_aluguel, numero_quarto, documento";

$retorno = executarComandoBanco($conn, $sql);
?>
<main>
    <h1>Listagem de Reservas</h1>
    <?=$mensagem?>
    <table>
        <tr>
            <th>ID</th>
            <th>Data de Reserva</th>
            <th>N. Apartamento</th>
            <th>Documento - Nome do Hóspede</th>
            <th>Ações</th>
        </tr>
    <?php
    while ($linha = pg_fetch_array($retorno)):
        $linha['data_aluguel'] = new DateTime($linha['data_aluguel']);
        $linha['data_aluguel'] = $linha['data_aluguel']->format('d/m/Y');
    ?>
        <tr>
            <td><?=$linha['res_id']?></td>
            <td><?=$linha['data_aluguel']?></td>
            <td><?=$linha['numero_quarto']?></td>        
            <td><?=$linha['documento']?> - <?=$linha['nome']?></td>
            <td>
                <a href="?url=listagemReserva&acao=excluir&id=<?=$linha['res_id']?>">Excluir</a>
                <a href="?url=cadastroReserva&id=<?=$linha['res_id']?>">Atualizar</a>
            </td>
        </tr>
    <?php
    endwhile;
    ?>
    </table>
</main>