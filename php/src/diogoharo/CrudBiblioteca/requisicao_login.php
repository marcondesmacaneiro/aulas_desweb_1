<?php
header('Content-Type: text/html; charset=utf-8');

$oConexao = pg_connect("host=localhost dbname=postgres 
user=postgres password=123");

$sLogin = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$sSenha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if(isset($sLogin) && isset($sSenha)){
    $sSql = "SELECT * FROM atividade.tbusuario WHERE  
                usologin='$sLogin' AND usosenha='$sSenha'";
    
    $oRes = pg_query($sSql);
    
    $aResultado = pg_fetch_array($oRes);
    /** se dar tudo certo com o select, ou seja, encontrar um registro ou registros, a
     * função pg_fetch_array irá retornar um array com as informações encontrados no banco, caso contrário
     * a função pg_fetch_array retorna false.
     */
    if($aResultado){
        session_start();
        $_SESSION['login'] = $sLogin;
       
        echo json_encode($aResultado);
    }
}