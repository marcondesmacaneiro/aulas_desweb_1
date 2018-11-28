<?php
    include "conexao.php";
    if (isset($_POST["gravar"])) {
        $cliente = $_POST['cliente'];
        $categoria = $_POST['categoria'];
        $produto = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $quantidade = $_POST["quantidade"];
        $valor = $_POST["valor"];
        $query = mysqli_query($conn, "insert into PRODUTO (NOME,DESCRICAO,QUANTIDADE,VALOR,CLIENTEID,CATEGORIAID) values ('$produto','$descricao','$quantidade','$valor','$cliente','$categoria')");
        echo "<script language='javascript' type='text/javascript'>alert('Registro Inserido com Sucesso!');window.location.href='cadastro_produto.php';</script>";
    }
    $query = "select CLIENTEID, NOME from CLIENTE";
    $result = mysqli_query($conn, $query);
    $query2 = "select CATEGORIAID, NOME from CATEGORIA";
    $result2 = mysqli_query($conn, $query2);
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
                    <td><a href="cadastro_produto.php" class="btn btn-primary-outline-active btn-sm" id="menu">Cadastrar Produto</a></td>
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
                <h2 class="text-uppercase">
                    Cadastro de Produto:    
                </h2>
                <hr/>
                <form method="post" name="cliente" class="text-center container index2">
                    <br>
                    <select class="form-control" name="cliente">
                        <option selected disabled>-- Selecione um Cliente --</option>
                        <?php
                            while ($cliente = mysqli_fetch_array($result)) {
                        ?>
	                    <option value="<?=$cliente["CLIENTEID"]?>"><?=$cliente["CLIENTEID"]?> - <?=$cliente["NOME"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <br>
                    <select class="form-control" name="categoria">
                        <option selected disabled>-- Selecione uma Categoria --</option>
                        <?php
                            while ($categoria = mysqli_fetch_array($result2)) {
                        ?>
	                    <option value="<?=$categoria["CATEGORIAID"]?>"><?=$categoria["CATEGORIAID"]?> - <?=$categoria["NOME"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <br>                     
                    <label for="nomeproduto">Nome do Produto:</label>
                    <input type="text" name="nome" placeholder="Digite o Nome do Produto" class="text-center form-control" required="required">
                    <br>
                    <table class="mx-5">
                        <tr>
                            <td class="cliente2">
                                <label for="quantidade">Quantidade:</label>
                                <input type="number" name="quantidade" placeholder="Quantidade do Produto" class="text-center form-control" required="required">
                            </td>
                            <td class="cliente2">
                                <label for="valor">Valor Unitário:</label>
                                <input type="number" name="valor" step="0.01" placeholder="Valor do Produto" class="text-center form-control" required="required">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <label for="descricao">Descrição:</label>
                    <textarea class="text-center form-control" placeholder="Digite Uma Descrição Para o Produto" name="descricao" rows="6" required="required" wrap="hard"></textarea>
                    <br>
                    <input type="reset" class="btn btn-danger btn-sm" value="Limpar">
                    <input type="submit" name="gravar" value="Gravar" class="btn btn-primary btn-sm">
                    <br>
                    <br>
                </form>
            </div>
    </body>
</html>
<?php
    }
else{
    header('Location: index.php');
}
?>