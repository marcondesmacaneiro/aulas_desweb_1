<?php
	header('Content-Type; text/html; charset=utf-8');

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	if (isset($login) && isset($senha)){
		if ($login == 'evandro' && $senha == '123'){
			session_start();
			$_SESSIOIN['login'] = $login;
			header('Location: pagina_segura.php');
		} else{
			echo "login invalido";
		}
	}else {
		echo "ocorreu uma falha ao capturar os dados de login";
	}
?>
<br/><a href="javascript:history.go(-1)">Voltar</a>