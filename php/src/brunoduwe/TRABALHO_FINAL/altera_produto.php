<?php
    include "conexao.php";
    if (isset($_POST['gravar'])) {
        $update = "update PRODUTO set NOME = '{$_POST['nome']}', DESCRICAO = '{$_POST['descricao']}', QUANTIDADE = '{$_POST['quantidade']}', VALOR = '{$_POST['valor']}', CATEGORIAID = '{$_POST['categoria']}', CLIENTEID = '{$_POST['cliente']}' where PRODUTOID = '{$_POST['produtoid']}'";
        mysqli_query($conn, $update);
        echo "<script language='javascript' type='text/javascript'>alert('Registro Alterado com Sucesso!');window.location.href='altera_produto.php';</script>";
    }
    if (isset($_POST['removers'])) {
        $delete = "delete from PRODUTO where PRODUTOID = '{$_POST['produtoid']}'";
        mysqli_query($conn, $delete);
        echo "<script language='javascript' type='text/javascript'>alert('Registro Removido com Sucesso!');window.location.href='altera_produto.php';</script>";
    }
    if (isset($_POST['atualizar']) and empty($_POST['option']) or isset($_POST['remover']) and empty($_POST['option'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Selecione um Produto Valido!');window.location.href='altera_produto.php';</script>";
    }
    if (isset($_POST['atualizar']) or isset($_POST['remover'])) {
        $queryesp = "select * from PRODUTO where PRODUTOID = '{$_POST['option']}'";
        $resultesp = mysqli_query($conn, $queryesp);
        $linhaesp = mysqli_fetch_array($resultesp);
    }
    $query = "select CLIENTEID, NOME from CLIENTE";
    $result = mysqli_query($conn, $query);
    $query2 = "select CATEGORIAID, NOME from CATEGORIA";
    $result2 = mysqli_query($conn, $query2);
    $query3 = "select * from PRODUTO";
    $result3 = mysqli_query($conn, $query3);
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
                    <td><a href="movimenta_estoque.php" class="btn btn-primary-outline btn-sm" id="menu">Movimentar estoque</a></td>
                    <td><a href="cadastro_pessoa.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Pessoa</a></td>
                    <td><a href="altera_pessoa.php" class="btn btn-primary-outline btn-sm" id="menu">Alterar Pessoa</a></td>
                    <td><a href="cadastro_produto.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Produto</a></td>
                    <td><a href="altera_produto.php" class="btn btn-primary-outline-active btn-sm" id="menu">Alterar Produto</a></td>
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
                <h2 class="text-uppercase">
                    Alterar Cadastro de Produto:    
                </h2>
                <hr/>
                <div class="container text-center index2">
                    <?php
                        if (empty($_POST['atualizar']) and empty($_POST['remover'])) {
                    ?>
                        <form method="post" name="atualizar">
                            <select class="form-control" name="option">
                                <option selected disabled>-- Selecione um Produto --</option>
                                <?php
                                    while ($linha = mysqli_fetch_array($result3)) {
                                ?>
	                            <option value="<?=$linha["PRODUTOID"]?>"><?=$linha["PRODUTOID"]?> - <?=$linha["NOME"]?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <br>
                            <input type="submit" name="remover" value="Remover" class="btn btn-danger btn-sm">
                            <input type="submit" name="atualizar" value="Atualizar" class="btn btn-primary btn-sm">
                        </form>
                    <?php
                        }
                    ?>
                    <?php
                        if (isset($_POST['remover'])) {
                    ?>
                        <p class="text-danger alert alert-danger">
                            Voce Tem Certeza Que Deseja Remover o Produto? <br> <?=$linhaesp['NOME']?>
                        </p>
                        <form method="post" name="remover">
                            <input type="hidden" name="produtoid" value="<?=$linhaesp['PRODUTOID']?>">
                            <input type="submit" name="removers" value="Sim" class="btn btn-danger btn-sm">
                            <a href="altera_produto.php" class="btn btn-secondary btn-sm">Não</a>
                        </form>
                    <?php
                        }
                    ?>
                    <?php
                        if (isset($_POST['atualizar'])) {
                    ?>
                        <form method="post" name="cliente" class="text-center container">
                            <input type="hidden" name="produtoid" value="<?=$linhaesp['PRODUTOID']?>">
                            <br>
                            <select class="form-control" name="cliente">
                                <?php
                                    while ($cliente = mysqli_fetch_array($result)) {
                                ?>
	                            <option value="<?=$cliente['CLIENTEID']?>" <?php if ($cliente['CLIENTEID'] == $linhaesp['CLIENTEID']) { ?> selected <?php } ?> > <?=$cliente["CLIENTEID"]?> - <?=$cliente["NOME"]?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <br>
                            <select class="form-control" name="categoria">
                                <?php
                                    while ($categoria = mysqli_fetch_array($result2)) {
                                ?>
	                            <option value="<?=$categoria["CATEGORIAID"]?>" <?php if ($categoria['CATEGORIAID'] == $linhaesp['CATEGORIAID']) { ?> selected <?php } ?>><?=$categoria["CATEGORIAID"]?> - <?=$categoria["NOME"]?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <br>                     
                            <label for="nomeproduto">Nome do Produto:</label>
                            <input type="text" name="nome" value="<?=$linhaesp['NOME']?>" class="text-center form-control" required="required">
                            <br>
                            <table class="mx-5">
                                <tr>
                                    <td class="cliente2">
                                        <label for="quantidade">Quantidade em Estoque:</label>
                                        <input type="number" name="quantidade" value="<?=$linhaesp['QUANTIDADE']?>" class="text-center form-control" required="required">
                                    </td>
                                    <td class="cliente2">
                                        <label for="valor">Valor Unitário:</label>
                                        <input type="number" name="valor" step="0.01" value="<?=$linhaesp['VALOR']?>" class="text-center form-control" required="required">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <label for="descricao">Descrição:</label>
                            <textarea class="text-center form-control" placeholder="Digite Uma Descrição Para o Produto" name="descricao" rows="6" required="required" wrap="hard"><?=$linhaesp['DESCRICAO']?></textarea>
                            <br>
                            <input type="submit" name="gravar" value="Gravar" class="btn btn-primary btn-sm">
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