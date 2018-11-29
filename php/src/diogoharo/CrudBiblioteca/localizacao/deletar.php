<?php
require '../config.php';
use app\model\Localizacao;
use app\model\Mensagens;
$oLocalizacao= new Localizacao;

if(isset($_POST['checkbox'])){
    foreach ($_POST['checkbox'] as $sCodigo){
       $oLocalizacao->setLoccodigo($sCodigo);
       $oLocalizacao->deletar(); 
    }
}
$oMensagens = new Mensagens();
$sMensagem = $oMensagens->mensagemExclusao();
include ("resultado.php");

