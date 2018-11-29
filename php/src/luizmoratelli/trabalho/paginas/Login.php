<?php
    $errorLogin = '';

    if (isset($_GET['error'])) {
        $errorLogin = '<div class="error">Usuário/Senha Incorretos!</div>';
    }   
?>

<div id="conteudo-principal">
    <div id="conteudo-login">
        <h1 id="titulo-login">Acessar</h1>
        <?=$errorLogin?>
        <form id="form-login" action="includes/validaLogin.php" method="POST">
            <input type="text" id="login-usuario" name="login-usuario" placeholder="Usuário">
            <input type="password" id="login-senha" name="login-senha" placeholder="Senha">
            <button type="submit" value="logar">Entrar</button>
        </form>
    </div>
</div>