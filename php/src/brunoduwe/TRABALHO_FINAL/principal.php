<?php
session_start();
$login_cookie = $_COOKIE['login'];
$nome_cookie = $_COOKIE['nome'];
if(isset($login_cookie)) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php');
        setcookie("login", null);
    }
?>
<!DOCTYPE html>
<html lang="pt">
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema De Estoque - <?=$login_cookie?></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="container">
        <nav class="navbar navbar-dark bg-dark fixed-top shadow-lg p-3 mb-5 menu">
            <a href="principal.php"><img src="img/logo.png"></a>
            <table class="container justify-content-center text-center">
                <tr>
                    <td><a href="consulta_estoque.php" class="btn btn-primary-outline btn-sm" id="menu">Consultar Estoque</a></td>
                    <td><a href="movimenta_estoque.php" class="btn btn-primary-outline btn-sm" id="menu">Movimentar estoque</a></td>
                    <td><a href="cadastro_pessoa.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Pessoa</a></td>
                    <td><a href="altera_pessoa.php" class="btn btn-primary-outline btn-sm" id="menu">Alterar Pessoa</a></td>
                    <td><a href="cadastro_produto.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Produto</a></td>
                    <td><a href="altera_produto.php" class="btn btn-primary-outline btn-sm" id="menu">Alterar Produto</a></td>
                    <td><a href="cadastro_categoria.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Categoria</a></td>
                    <td><a href="altera_categoria.php" class="btn btn-primary-outline btn-sm" id="menu">Alterar Categoria</a></td>
                    <td>
                        <form method="GET" action="">
                            <input name="logout" type="hidden" />
                            <button class="btn btn-danger btn-sm" id="btn_sair">Sair</button>
                        </form>
                    </td>
                </tr>
            </table>
            </nav>
            <div class="conteudo">
                <h2 class="text-uppercase float-left">
                    Seja bem vindo, <?=$nome_cookie?>
                </h2>
                <img src="img/principal.png" class="float-right"/>
                <p class="text-primary alert alert-primary clearright">
                O sistema de Estoque é um sistema onde voce controla a entrada e saida de produtos de seu estoque, 
                visando aumentar o controle sobre seu patrimonio. Neste sistema voce pode cadastrar novos clientes e usuários do sistema, 
                cadastrar produtos, categorias, consultar os produtos em estoque e movimentar o estoque.
                </p>
                <p class="text-danger alert alert-danger">
                Lembramos tambem que você pode alterar e/ou excluir qualquer informação a qualquer momento.
                </p>
                <img src="img/caixas.png" class="caixa">
            </div>
    </body>
</html>
<?php
    }
else{
    header('Location: index.php');
}
?>