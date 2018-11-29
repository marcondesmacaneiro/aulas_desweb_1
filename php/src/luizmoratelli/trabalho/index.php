<?php 
date_default_timezone_set('America/Sao_Paulo');
session_start();
if ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == 'localhost') {
    $diretorioSite = 'C:\xampp\htdocs\marcondes\aulas_desweb_1\php\src\luizmoratelli\trabalho';
    $linkSite = 'localhost/marcondes/aulas_desweb_1/php/src/luizmoratelli/trabalho';
}

$paginaIncluir = 'Home';

if (isset($_GET['url'])) {
    $paginaIncluir = ucfirst($_GET['url']);

    if (!file_exists($diretorioSite.'/paginas/'.$paginaIncluir.'.php')) {
        $paginaIncluir = '404';
    } 
}

if (!isset($_SESSION['userId'])) {
    $paginaIncluir = 'Login';
}

require_once($diretorioSite.'/includes/cabecalho.php');

require_once($diretorioSite.'/paginas/'.$paginaIncluir.'.php');

require_once($diretorioSite.'/includes/rodape.php');