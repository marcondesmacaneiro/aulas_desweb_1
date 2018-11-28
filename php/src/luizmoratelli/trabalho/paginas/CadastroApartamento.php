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
        $numeroQuarto = $_POST['numero_quarto'];
        $qtdCamaSolteiro = $_POST['qtd-cama-solteiro'];
        $qtdCamaCasal = $_POST['qtd-cama-casal'];
        $qtdBanheiro = $_POST['qtd-banheiro'];
        $qtdArCondicionado = $_POST['qtd-ar-condicionado'];
        $qtdTelevisao = $_POST['qtd-televisao'];
        $qtdPrecoDiaria = $_POST['preco-diaria'];

        $sql = "
            INSERT INTO apartamento (
                            numero_quarto,
                            qtd_cama_solteiro,
                            qtd_cama_casal,
                            qtd_banheiro,
                            qtd_ar_condicionado,
                            qtd_televisao,
                            preco_diaria
                        )
                        VALUES(
                            $numeroQuarto,
                            $qtdCamaSolteiro,
                            $qtdCamaCasal,
                            $qtdBanheiro,
                            $qtdArCondicionado,
                            $qtdTelevisao,
                            $qtdPrecoDiaria
                        )";
        
        $retorno = @pg_affected_rows(executarComandoBanco($conn, $sql));

        if ($retorno > 0) {
            $mensagem = '<div class="success">Apartamento inserido com sucesso!</div>';
        } else {
            $mensagem = '<div class="error">Falha ao inserir novo apartamento!</div>';
        }
        
    } else if ($acao == 'atualizar') {
        $id = $_POST['id'];
        $numeroQuarto = $_POST['numero_quarto'];
        $qtdCamaSolteiro = $_POST['qtd-cama-solteiro'];
        $qtdCamaCasal = $_POST['qtd-cama-casal'];
        $qtdBanheiro = $_POST['qtd-banheiro'];
        $qtdArCondicionado = $_POST['qtd-ar-condicionado'];
        $qtdTelevisao = $_POST['qtd-televisao'];
        $qtdPrecoDiaria = $_POST['preco-diaria'];

        $sql = "
            UPDATE apartamento 
               SET numero_quarto = $numeroQuarto, 
                   qtd_cama_solteiro = $qtdCamaSolteiro,
                   qtd_cama_casal = $qtdCamaCasal,
                   qtd_banheiro = $qtdBanheiro,
                   qtd_ar_condicionado = $qtdArCondicionado,
                   qtd_televisao = $qtdTelevisao,
                   preco_diaria = $qtdPrecoDiaria
             WHERE id = $id";
        
        $retorno = @pg_affected_rows(executarComandoBanco($conn, $sql));

        if ($retorno > 0) {
            $mensagem = '<div class="success">Apartamento atualizado com sucesso!</div>';
        } else {
            $mensagem = '<div class="error">Falha ao atualizar apartamento!</div>';
        }
    }
}

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "
        SELECT *
          FROM apartamento
         WHERE id = $id";

    $retorno = executarComandoBanco($conn, $sql);
    $linha = pg_fetch_array($retorno);
}

?>
<main>
    <form method="POST">
        <h1>Cadastro de Apartamento</h1>
        <?=$mensagem?>
        <input type="hidden" id="id" name="id" value="<?=((isset($_GET['id'])) ? $_GET['id'] : '0')?>">
        <div class="row">
            <div class="col-25">
                <label for="numero_quarto">Número do Quarto:</label>
            </div>
            <div class="col-75">   
                <input type="number" id="numero_quarto" name="numero_quarto" value="<?=((isset($linha['numero_quarto'])) ? $linha['numero_quarto'] : '')?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="qtd-cama-solteiro">Quantidade de Camas de Solteiro:</label>
            </div>
            <div class="col-75"> 
                <input type="number" id="qtd-cama-solteiro" name="qtd-cama-solteiro" value="<?=((isset($linha['qtd_cama_solteiro'])) ? $linha['qtd_cama_solteiro'] : '')?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="qtd-cama-casal">Quantidade de Camas de Casal:</label>
            </div>
            <div class="col-75"> 
                <input type="number" id="qtd-cama-casal" name="qtd-cama-casal" value="<?=((isset($linha['qtd_cama_casal'])) ? $linha['qtd_cama_casal'] : '')?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="qtd-banheiro">Quantidade de Banheiros:</label>
            </div>
            <div class="col-75"> 
                <input type="number" id="qtd-banheiro" name="qtd-banheiro" value="<?=((isset($linha['qtd_banheiro'])) ? $linha['qtd_banheiro'] : '')?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="qtd-ar-condicionado">Quantidade de Ares Condicionados:</label>
            </div>
            <div class="col-75"> 
                <input type="number" id="qtd-ar-condicionado" name="qtd-ar-condicionado" value="<?=((isset($linha['qtd_ar_condicionado'])) ? $linha['qtd_ar_condicionado'] : '')?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="qtd-televisao">Quantidade de Camas de Casal:</label>
            </div>
            <div class="col-75"> 
                <input type="number" id="qtd-televisao" name="qtd-televisao" value="<?=((isset($linha['qtd_televisao'])) ? $linha['qtd_televisao'] : '')?>"><br/>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="preco-diaria">Preço Diária:</label>
            </div>
            <div class="col-75"> 
                <input type="text" id="preco-diaria" name="preco-diaria" value="<?=((isset($linha['preco_diaria'])) ? $linha['preco_diaria'] : '')?>"><br/>
            </div>
        </div>
        <div class="row">
            <input type="submit" name="acao" value="<?=((isset($_GET['id'])) ? 'atualizar' : 'gravar')?>">
        </div>
    </form>
</main>