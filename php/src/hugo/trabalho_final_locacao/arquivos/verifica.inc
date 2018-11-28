<?php

    $sPagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';
    
    if($sPagina=='home'){
        if($sUser == 'adm'){
            echo '<h3>Seja bem vindo Administrador, hoje é dia '.date('d/m/Y').'</h3>';
        }
        else{
            echo '<h3>Seja bem vindo '.$sUser['pesnome'].', hoje é dia '.date('d/m/Y').'</h3>';
        }
    }
    else{
        include_once $sPagina.'.inc';
    }
