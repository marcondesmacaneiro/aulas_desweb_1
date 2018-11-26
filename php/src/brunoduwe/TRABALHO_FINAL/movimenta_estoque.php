<?php
    include "conexao.php";
    if (isset($_POST['adicionar'])) {
        $quantidade = $_POST['quantinicial'] + $_POST['quantidade'];
        $update = "update PRODUTO set QUANTIDADE = '{$quantidade}', VALOR = '{$_POST['valor']}' where PRODUTOID = '{$_POST['produtoid']}'";
        mysqli_query($conn, $update);
        echo "<script language='javascript' type='text/javascript'>alert('Estoque Adicionado com Sucesso!');window.location.href='movimenta_estoque.php';</script>";
    }
    if (isset($_POST['remover'])) {
        $quantidade = $_POST['quantinicial'] - $_POST['quantidade'];
        if ($quantidade >= 0) {
            $remove = "update PRODUTO set QUANTIDADE = '{$quantidade}', VALOR = '{$_POST['valor']}' where PRODUTOID = '{$_POST['produtoid']}'";
            mysqli_query($conn, $remove);
            echo "<script language='javascript' type='text/javascript'>alert('Estoque Reduzido com Sucesso!');window.location.href='movimenta_estoque.php';</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('O Estoque Não Pode Ficar Negativo!');window.location.href='movimenta_estoque.php';</script>";
        }
    }
    if (isset($_POST['enviarproduto']) and empty($_POST['selectproduto']) or isset($_POST['enviarcliente']) and isset($_POST['selectcliente']) == null) {
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
    if (isset($_POST['enviarproduto'])) {
        $queryesp2 = "select A.*, B.NOME CATEGORIA, B.DESCRICAO CATDESCRICAO from PRODUTO A inner join categoria B on B.CATEGORIAID = A.CATEGORIAID where A.PRODUTOID = '{$_POST['selectproduto']}'";
        $resultesp2 = mysqli_query($conn, $queryesp2);
        $linhaesp2 = mysqli_fetch_array($resultesp2);
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
                    <td><a href="consulta_estoque.php" class="btn btn-primary-outline btn-sm" id="menu">Consultar Estoque</a></td>
                    <td><a href="movimenta_estoque.php" class="btn btn-primary-outline-active btn-sm" id="menu">Movimentar estoque</a></td>
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
                    Movimentar Estoque:    
                </h2>
                <hr/>
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
                        <select class="form-control" name="selectproduto">
                            <option selected disabled>-- Selecione um Produto --</option>
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
                    <?php
                        }
                    ?>
                    <?php
                        if (isset($_POST['enviarproduto'])) {
                    ?>
                        <table class="table table-bordered">
                            <tr>
                                <td class="m-0 p-0 text-uppercase">
                                    <h6>Nome do Produto:</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?=$linhaesp2['NOME']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 text-uppercase">
                                    <h6>Descrição do Produto:</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?=$linhaesp2['DESCRICAO']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 text-uppercase">
                                    <h6>Categoria:</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?=$linhaesp2['CATEGORIA']?>
                                </td>
                            </tr>
                            <tr>
                                <td class="m-0 p-0 text-uppercase">
                                    <h6>Descrição da Categoria:</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?=$linhaesp2['CATDESCRICAO']?>
                                </td>
                            </tr>
                        </table>
                        <form method="post" name="alteraestoque" >
                            <input type="hidden" name="produtoid" value="<?=$linhaesp2['PRODUTOID']?>">
                            <input type="hidden" name="quantinicial" value="<?=$linhaesp2['QUANTIDADE']?>">
                            <table class="mx-5">
                                <tr>
                                    <td class="cliente2">
                                        <label for="quantidade">Quantidade:</label>
                                        <input type="number" name="quantidade" placeholder="Informe a Quantidade"class="text-center form-control" required="required">
                                    </td>
                                    <td class="cliente2">
                                        <label for="valor">Valor Unitário:</label>
                                        <input type="number" name="valor" value="<?=$linhaesp2['VALOR']?>" step="0.01" class="text-center form-control" required="required">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <input type="submit" name="remover" value="Remover" class="btn btn-danger btn-sm">
                            <input type="submit" name="adicionar" value="Adicionar" class="btn btn-primary btn-sm">
                            <br>
                            <br>
                        </form>
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