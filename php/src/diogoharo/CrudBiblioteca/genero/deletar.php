<?php
require '../config.php';
use app\model\Genero;
use app\model\Mensagens;
$oGenero= new Genero;

if(isset($_POST['checkbox'])){
    foreach ($_POST['checkbox'] as $sCodigo){
       $oGenero->setGencodigo($sCodigo);
       $oGenero->deletar(); 
    }
}
$oMensagens = new Mensagens();
$sMensagem = $oMensagens->mensagemExclusao();
include ("resultado.php");


