<?php

require '../config.php';

use app\model\Autor;
use app\model\Mensagens;

$oAutor = new Autor;
$oMensagens = new Mensagens();
$sMensagem = '';

if (isset($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $sCodigo) {
        $oAutor->setAutcodigo($sCodigo);
        if ($oAutor->deletar() != true) {
            $sMensagem = $oMensagens->mensagemErro();
        }
    }
}
if ($sMensagem == '') {
    $sMensagem = $oMensagens->mensagemExclusao();
}
include ("resultado.php");

