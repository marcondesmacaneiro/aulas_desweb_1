<?php

require '../config.php';

use app\model\Localizacao;
use app\model\Mensagens;

$oMensagens = new Mensagens();
$oLocalizacao = new Localizacao;
$sMensagem = '';
if (isset($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $sCodigo) {
        $oLocalizacao->setLoccodigo($sCodigo);
        if ($oLocalizacao->deletar() != true) {
            $sMensagem = $oMensagens->mensagemErro();
        }
    }
}
if ($sMensagem == '') {
    $sMensagem = $oMensagens->mensagemExclusao();
}
include ("resultado.php");

