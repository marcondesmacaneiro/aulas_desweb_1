<?php

require_once '../config.php';
use app\model\Livro;
use app\model\Autor;
use app\model\AutorLivro;
use app\model\Genero;
use app\model\Localizacao;
use app\model\Mensagens;
header('Content-Type: text/html; charset=utf-8');

    $sNome = filter_input(INPUT_POST, 'livro', FILTER_SANITIZE_STRING);
    $sLocalizacao = filter_input(INPUT_POST, 'select_localizacao', FILTER_SANITIZE_STRING);
    $sGenero = filter_input(INPUT_POST, 'select_genero', FILTER_SANITIZE_STRING);

    $oLivro= new Livro();
    $oAutor = new Autor();
    $oGenero = new Genero();
    $oLocalizacao = new Localizacao();
    $oAutorLivro = new AutorLivro;
    
    $oLivro->setLivnome($sNome);
    $oGenero->setGencodigo($sGenero);
    $oLocalizacao->setLoccodigo($sLocalizacao);
    $oLivro->setGenero($oGenero);
    $oLivro->setLocalizacao($oLocalizacao);
    
    $ultimo= $oLivro->inserir();
    
    if(isset($_POST['checkbox'])){
    foreach ($_POST['checkbox'] as $sCodigo){
        $oLivro->setLivcodigo($ultimo);
        $oAutorLivro->setLivro($oLivro);
        $oAutor->setAutcodigo($sCodigo);
        $oAutorLivro->setAutor($oAutor);
        $oAutorLivro->inserir();
    }
    
    $oMensagens = new Mensagens();
    $sMensagem = $oMensagens->mensagemInclusao();
    include ("../cadastroLivro.php");
}
   
   

    






