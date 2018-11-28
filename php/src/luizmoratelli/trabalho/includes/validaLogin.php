<?php
session_start();
require_once('conexao.php');
require_once('funcoes.php');

if ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == 'localhost') {
    $diretorioSite = 'localhost\marcondes\aulas_desweb_1\php\src\luizmoratelli\trabalho';
}

if (isset($_POST['login-usuario']) && isset($_POST['login-senha'])) {
    $usuario = $_POST['login-usuario'];
    $senha = $_POST['login-senha'];

    $sql = "
        SELECT id, username, pass
          FROM usuario
         WHERE username = '$usuario'
           AND pass = '$senha'";

    $retorno = executarComandoBanco($conn, $sql);
    $linha = pg_fetch_array($retorno);

    if ($linha) {
        $_SESSION['userId'] = $linha['id'];
        header("Location: http://$diretorioSite");
    } else {
        header("Location: http://$diretorioSite?error=error-login");
    }
}
else {
    header("Location: http://$diretorioSite?error=error-login");
}