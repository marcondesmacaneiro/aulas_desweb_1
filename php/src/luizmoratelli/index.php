<?php
    $diretorioSite = $_SERVER['DOCUMENT_ROOT'].'/marcondes/aulas_desweb_1/php/src/luizmoratelli';
    $paginaIncluir = 'Home';
    include($diretorioSite.'/Cabecalho.php');

    if (isset($_GET['url'])) {
        $paginaIncluir = ucfirst($_GET['url']);

        if (!file_exists($diretorioSite.'/paginas/'.$paginaIncluir.'.php')) {
            $paginaIncluir = '404';
        } 
    }

    include($diretorioSite.'/paginas/'.$paginaIncluir.'.php');

    include($diretorioSite.'/Rodape.php');