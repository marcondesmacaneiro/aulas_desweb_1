<?php
    include "conexao.php";
    if (isset($_POST['enviarproduto']) and isset($_POST['selectproduto']) == null or isset($_POST['enviarcliente']) and isset($_POST['selectcliente']) == null) {
        echo "<script language='javascript' type='text/javascript'>alert('Selecione um Registro Valido!');window.location.href='movimenta_estoque.php';</script>";
    }
    if (isset($_POST['enviarcliente']) and $_POST['selectcliente'] <> 0) {
        $queryesp = "select * from PRODUTO where CLIENTEID = '{$_POST['selectcliente']}'";
        $resultesp = mysqli_query($conn, $queryesp);
    }
    if (isset($_POST['enviarcliente']) and $_POST['selectcliente'] == 0) {
        $queryesp = "select * from PRODUTO";
        $resultesp = mysqli_query($conn, $queryesp);
    }
    if (isset($_POST['enviarproduto']) and $_POST['selectproduto'] <> 0 and $_POST['clienteid'] == 0) {
        $queryesp2 = "select A.*, B.NOME CATEGORIA from PRODUTO A inner join categoria B on B.CATEGORIAID = A.CATEGORIAID where A.PRODUTOID = '{$_POST['selectproduto']}'";
        $resultesp2 = mysqli_query($conn, $queryesp2);
    }
    if (isset($_POST['enviarproduto']) and $_POST['selectproduto'] == 0 and $_POST['clienteid'] == 0) {
        $queryesp2 = "select A.*, B.NOME CATEGORIA from PRODUTO A inner join categoria B on B.CATEGORIAID = A.CATEGORIAID";
        $resultesp2 = mysqli_query($conn, $queryesp2);
    }
    if (isset($_POST['enviarproduto']) and $_POST['selectproduto'] <> 0 and $_POST['clienteid'] <> 0) {
        $queryesp2 = "select A.*, B.NOME CATEGORIA from PRODUTO A inner join categoria B on B.CATEGORIAID = A.CATEGORIAID where A.PRODUTOID = '{$_POST['selectproduto']}' and A.CLIENTEID = '{$_POST['clienteid']}'";
        $resultesp2 = mysqli_query($conn, $queryesp2);
    }
    if (isset($_POST['enviarproduto']) and $_POST['selectproduto'] == 0 and $_POST['clienteid'] <> 0) {
        $queryesp2 = "select A.*, B.NOME CATEGORIA from PRODUTO A inner join categoria B on B.CATEGORIAID = A.CATEGORIAID where A.CLIENTEID = '{$_POST['clienteid']}'";
        $resultesp2 = mysqli_query($conn, $queryesp2);
    }
    $query = "select * from CLIENTE";
    $result = mysqli_query($conn, $query);  
?>
<?php
session_start();
$login_cookie = $_COOKIE['login'];
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
                    <td><a href="consulta_estoque.php" class="btn btn-primary-outline-active btn-sm" id="menu">Consultar Estoque</a></td>
                    <td><a href="movimenta_estoque.php" class="btn btn-primary-outline btn-sm" id="menu">Movimentar estoque</a></td>
                    <td><a href="cadastro_pessoa.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Pessoa</a></td>
                    <td><a href="altera_pessoa.php" class="btn btn-primary-outline btn-sm" id="menu">Alterar Pessoa</a></td>
                    <td><a href="cadastro_produto.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Produto</a></td>
                    <td><a href="altera_produto.php" class="btn btn-primary-outline btn-sm" id="menu">Alterar Produto</a></td>
                    <td><a href="cadastro_categoria.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Categoria</a></td>
                    <td><a href="altera_categoria.php" class="btn btn-primary-outline btn-sm" id="menu">Alterar Categoria</a></td>
                    <td>
                        <form method="GET" action=""">
                            <input name="logout" type="hidden" />
                            <button class="btn btn-danger btn-sm" id="btn_sair">Sair</button>
                        </form>
                    </td>
                </tr>
            </table>
            </nav>
            <div class="conteudo">
                <h2 class="text-uppercase">
                    Consulta de Estoque:    
                </h2>
                <hr/>
                <?php
                    if (empty($_POST['enviarproduto'])) {
                ?>
                    <div class="container text-center index2">
                        <?php
                            if (empty($_POST['enviarcliente']) and empty($_POST['enviarproduto'])) {
                        ?>
                            <form method="post" name="formcliente">
                                <select class="form-control" name="selectcliente">
                                    <option selected disabled>-- Selecione um Cliente --</option>
                                    <option value="0">TODOS OS CLIENTES</option>
                                    <?php
                                        while ($cliente = mysqli_fetch_array($result)) {
                                    ?>
	                                <option value="<?=$cliente["CLIENTEID"]?>"><?=$cliente["CLIENTEID"]?> - <?=$cliente["NOME"]?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <br>
                                <input type="submit" name="enviarcliente" value="Selecionar" class="btn btn-primary btn-sm">
                            </form>
                        <?php
                            }
                        ?>
                        <?php
                            if (isset($_POST['enviarcliente'])) { 
                        ?>
                            <form method="post" name="formproduto">
                                <input type="hidden" name="clienteid" value="<?=$_POST['selectcliente']?>">
                                <select class="form-control" name="selectproduto">
                                    <option selected disabled>-- Selecione um Produto --</option>
                                    <option value="0">TODOS OS PRODUTOS</option>
                                    <?php
                                        while ($produto = mysqli_fetch_array($resultesp)) {
                                    ?>
	                                <option value="<?=$produto["PRODUTOID"]?>"><?=$produto["PRODUTOID"]?> - <?=$produto["NOME"]?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <br>
                                <input type="submit" name="enviarproduto" value="Selecionar" class="btn btn-primary btn-sm">
                            </form>
                        <?php
                            }
                        ?>
                    </div>
                <?php
                    }
                ?>
                <div class="container text-center index3">
                    <?php
                        if (isset($_POST['enviarproduto'])) {
                    ?>
                        <table class="table table-striped">
                            <thead>
                                <tr class="m-0 p-0 text-uppercase">
                                    <th scope="col">Código</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Valor Unitário</th>
                                    <th scope="col">Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while ($exibir = mysqli_fetch_array($resultesp2)) {
                                ?>
                                    <tr>
                                        <th><?=$exibir["PRODUTOID"]?></th>
                                        <td><?=$exibir["NOME"]?></td>
                                        <td><?=$exibir["QUANTIDADE"]?></td>
                                        <td><?=$exibir["VALOR"]?></td>
                                        <td><?=$exibir["CATEGORIA"]?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php
                        }
                    ?>
                </div>
            </div>
    </body>
</html>
<?php
    }
else{
    header('Location: index.php');
}
?>