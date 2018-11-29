<?php

require '../config.php';

use app\model\Genero;
use app\model\Mensagens;

$oGenero = new Genero;
$oMensagens = new Mensagens();
$sMensagem = '';

if (isset($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $sCodigo) {
        $oGenero->setGencodigo($sCodigo);
        if ($oGenero->deletar() != true) {
            $sMensagem = $oMensagens->mensagemErro();
        }
    }
}
if ($sMensagem == '') {
    $sMensagem = $oMensagens->mensagemExclusao();
}
include ("resultado.php");


