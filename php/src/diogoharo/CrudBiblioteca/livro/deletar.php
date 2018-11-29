<?php

require_once '../config.php';
use app\model\Livro;
use app\model\AutorLivro;
use app\model\Mensagens;
header('Content-Type: text/html; charset=utf-8');

$oLivro = new Livro();
$oAutorLivro= new AutorLivro();

if (isset($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $sCodigo) {
        $oLivro->setLivcodigo($sCodigo);
        $oAutorLivro->setLivro($oLivro);
        $oAutorLivro->deletar();
        $oLivro->deletar();
    }
}

$oMensagens = new Mensagens();
$sMensagem = $oMensagens->mensagemExclusao();

include ("./resultado.php");