<?php
require '../config.php';
use app\model\Autor;
use app\model\Mensagens;
$oAutor= new Autor;

if(isset($_POST['checkbox'])){
    foreach ($_POST['checkbox'] as $sCodigo){
       $oAutor->setAutcodigo($sCodigo);
       $oAutor->deletar(); 
    }
}
$oMensagens = new Mensagens();
$sMensagem = $oMensagens->mensagemExclusao();
include ("resultado.php");

