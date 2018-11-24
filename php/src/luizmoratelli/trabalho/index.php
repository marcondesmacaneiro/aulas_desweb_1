<?php 

$diretorioSite = $_SERVER['DOCUMENT_ROOT'].'/marcondes/aulas_desweb_1/php/src/luizmoratelli/trabalho';
$paginaIncluir = 'Home';

if (isset($_GET['url'])) {
    $paginaIncluir = ucfirst($_GET['url']);

    if (!file_exists($diretorioSite.'/paginas/'.$paginaIncluir.'.php')) {
        $paginaIncluir = '404';
    } 
}

require_once($diretorioSite.'/includes/cabecalho.php');

require_once($diretorioSite.'/paginas/'.$paginaIncluir.'.php');

require_once($diretorioSite.'/includes/rodape.php');