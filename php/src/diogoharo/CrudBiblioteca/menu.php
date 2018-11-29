<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
}
?>
<br>
<?php
echo "<p class='alert alert-success'>Bem Vindo!" . ' ' . $_SESSION['login'] . "</p>";
?>
<a href="?logout" class="btn btn-danger" id="logout">Sair</a>
<nav>
    <ul class="nav nav-pills">
        <li <?php
if ($verifica['genero']) {
    echo "class='active'";
}
?>><a role="presentation" href="genero.php">Gênero</a></li>
        <li <?php
        if ($verifica['localizacao']) {
            echo "class='active'";
        }
?>><a role="presentation" href="localizacao.php">Localização</a></li>
        <li <?php
        if ($verifica['livro']) {
            echo "class='active'";
        }
?>><a  role="presentation" href="livro.php">livro</a></li>
        <li <?php
        if ($verifica['autor']) {
            echo "class='active'";
        }
?>><a  role="presentation" href="autor.php">Autor</a></li>
    </ul>

</nav>

