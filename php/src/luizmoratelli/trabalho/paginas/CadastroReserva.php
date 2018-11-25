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
        $idHospede = $_POST['hos-id'];
        $idApartamento = $_POST['apt-id'];
        $dataAluguel = new DateTime($_POST['data-aluguel']);
        $dataAluguel = $dataAluguel->format('d-m-Y H:i:s');

        $sql = "
            SELECT *
              FROM reserva
             WHERE apt_id = $idApartamento
               AND data_aluguel = '$dataAluguel'";
        
        $retorno = executarComandoBanco($conn, $sql);

        if (pg_num_rows($retorno) == 0) {

            $sql = "
                INSERT INTO reserva (
                                hos_id,
                                apt_id,
                                data_Aluguel
                            )
                            VALUES(
                                $idHospede,
                                $idApartamento,
                                '$dataAluguel'
                            )";
            
            $retorno = pg_affected_rows(executarComandoBanco($conn, $sql));

            if ($retorno > 0) {
                $mensagem = '<div class="success">Reserva inserida com sucesso!</div>';
            } else {
                $mensagem = '<div class="error">Falha ao inserir nova reserva!</div>';
            }
        } else {
            $mensagem = '<div class="error">Apartamento já reservado para esse dia!</div>';
        }
        
    } else if ($acao == 'atualizar') {
        $id = $_POST['id'];
        $idHospede = $_POST['hos-id'];
        $idApartamento = $_POST['apt-id'];
        $dataAluguel = new DateTime($_POST['data-aluguel']);
        $dataAluguel = $dataAluguel->format('d-m-Y H:i:s');

        $sql = "
            UPDATE reserva 
               SET hos_id = $idHospede, 
                   apt_id = $idApartamento,
                   data_aluguel = '$dataAluguel'
             WHERE id = $id";
        
        $retorno = @pg_affected_rows(executarComandoBanco($conn, $sql));

        if ($retorno > 0) {
            $mensagem = '<div class="success">Reserva atualizada com sucesso!</div>';
        } else {
            $mensagem = '<div class="error">Falha ao atualizar reserva!</div>';
        }
    }
}

$linha['hos_id'] = '';
$linha['apt_id'] = '';

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "
        SELECT *
          FROM reserva
         WHERE id = $id";

    $retorno = executarComandoBanco($conn, $sql);
    $linha = pg_fetch_array($retorno);
    $linha['data_aluguel'] = new DateTime($linha['data_aluguel']);
    $linha['data_aluguel'] = $linha['data_aluguel']->format('Y-m-d');
}

?>
<form method="POST">
    <?=$mensagem?>
    <input type="hidden" id="id" name="id" value="<?=((isset($_GET['id'])) ? $_GET['id'] : '0')?>">
    <label for="hos-id">Documento - Nome do Hóspede:</label>
    <select name="hos-id" id="hos-id">
    <?php
        $sql = "
            SELECT id, nome, documento
              FROM hospede";
            
        $retorno = executarComandoBanco($conn, $sql);
        while($linhaSelect = pg_fetch_array($retorno)):
        ?>
            <option value="<?=$linhaSelect['id']?>" <?=(($linhaSelect['id'] == $linha['hos_id']) ? 'selected' : '')?>><?=$linhaSelect['documento']?> - <?=$linhaSelect['nome']?></option>
        <?php
        endwhile;
    ?>
    </select><br>
    <label for="apt-id">Número do Quarto:</label>
    <select name="apt-id" id="apt-id">
    <?php
        $sql = "
            SELECT id, numero_quarto
              FROM apartamento";
            
        $retorno = executarComandoBanco($conn, $sql);
        while($linhaSelect = pg_fetch_array($retorno)):
        ?>
            <option value="<?=$linhaSelect['id']?>" <?=(($linhaSelect['id'] == $linha['apt_id']) ? 'selected' : '')?>><?=$linhaSelect['numero_quarto']?></option>
        <?php
        endwhile;
    ?>
    </select><br>
    <label for="data-aluguel">Data de Início:</label>
    <input type="date" id="data-aluguel" name="data-aluguel" value="<?=((isset($linha['data_aluguel'])) ? $linha['data_aluguel'] : '')?>"><br/>

    <input type="submit" name="acao" value="<?=((isset($_GET['id'])) ? 'atualizar' : 'gravar')?>">
</form>