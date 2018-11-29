<?php

require_once '../config.php';
use app\model\Livro;
header('Content-Type: text/html; charset=utf-8');

/* Verificando se o codigo foi informado () */
if (isset($_POST['codigo'])) {
    $oLivro = new Livro();
    $oLivro->setLivcodigo($_POST['codigo']);
    $oLiv = $oLivro->selecionar();
    $aLivroSelecionado = [
            $oLiv->getLivcodigo(), 
            $oLiv->getLivnome()
            ];
    echo json_encode($aLivroSelecionado); 
}





