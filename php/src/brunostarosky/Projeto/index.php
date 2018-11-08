<?php
    include "conexao.php";
?>



<p>Digite seu e-mail e senha para acessar sua conta.</p>

<form method="post">
    E-mail:
    <input type="text" name="email">
    <br />
    <br />
    Senha:
    <input type="password" name="password">
    <br />
    <input type="submit" name="submit" value="submit">
</form>

<a href="cadastro.php">Se não tiver uma conta crie uma clicando aqui!</a>