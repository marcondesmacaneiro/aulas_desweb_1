<?php

spl_autoload_register('load');

function load($nomeClasse) {
    $sExt = '.php';
    $sCaminho = '../model/' . $nomeClasse . $sExt;
    if (file_exists($sCaminho)) {
        require_once $sCaminho;
    }
}

spl_autoload_register('load2');

function load2($nomeClasse) {
    $sExt = '.php';
    $sCaminho = 'model/' . $nomeClasse . $sExt;
    if (file_exists($sCaminho)) {
        require_once $sCaminho;
    }
}
