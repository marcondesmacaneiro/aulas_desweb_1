<?php
    include "conexao.php";
    if (isset($_POST['gravar'])) {
        $update = "update CLIENTE set NOME = '{$_POST['nome']}', TELEFONE = '{$_POST['telefone']}', PAIS = '{$_POST['pais']}', ESTADO = '{$_POST['estado']}', CIDADE = '{$_POST['cidade']}', BAIRRO = '{$_POST['bairro']}', RUA = '{$_POST['rua']}', COMPLEMENTO = '{$_POST['complemento']}' where CLIENTEID = '{$_POST['clienteid']}'";
        mysqli_query($conn, $update);
        echo "<script language='javascript' type='text/javascript'>alert('Registro Alterado com Sucesso!');window.location.href='altera_cliente.php';</script>";
    }
    if (isset($_POST['removers'])) {
        $delete = "delete from CLIENTE where CLIENTEID = '{$_POST['clienteid']}'";
        mysqli_query($conn, $delete);
        echo "<script language='javascript' type='text/javascript'>alert('Registro Removido com Sucesso!');window.location.href='altera_cliente.php';</script>";
    }
    if (isset($_POST['atualizar']) and empty($_POST['option']) or isset($_POST['remover']) and empty($_POST['option'])) {
        echo "<script language='javascript' type='text/javascript'>alert('Selecione um Usuario Valido!');window.location.href='altera_cliente.php';</script>";
    }
    if (isset($_POST['atualizar']) or isset($_POST['remover'])) {
        $queryesp = "select * from CLIENTE where CLIENTEID = '{$_POST['option']}'";
        $resultesp = mysqli_query($conn, $queryesp);
        $linhaesp = mysqli_fetch_array($resultesp);
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
                    <td><a href="movimenta_estoque.php" class="btn btn-primary-outline btn-sm" id="menu">Movimentar estoque</a></td>
                    <td><a href="cadastro_pessoa.php" class="btn btn-primary-outline btn-sm" id="menu">Cadastrar Pessoa</a></td>
                    <td><a href="altera_pessoa.php" class="btn btn-primary-outline-active btn-sm" id="menu">Alterar Pessoa</a></td>
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
                    Alterar Cadastro de Cliente:    
                </h2>
                <hr/>
                <p class="font-weight-bold">
                    Qual o Tipo de Cadastro?
                </p>
                <div class="p-1 rounded bg-secondary float-left">
                    <a href="altera_usuario.php" class="btn btn-secondary pessoa btn-sm" id="usuario">Usuário</a>
                    <a href="altera_cliente.php" class="btn btn-secondary active btn-sm" id="cliente">Cliente</a>   
                </div>
                <div class="container text-center index">
                    <?php
                        if (empty($_POST['atualizar']) and empty($_POST['remover'])) {
                    ?>
                        <form method="post" name="atualizar">
                            <select class="form-control" name="option">
                                <option selected disabled>-- Selecione um Cliente --</option>
                                <?php
                                    while ($linha = mysqli_fetch_array($result)) {
                                ?>
	                            <option value="<?=$linha["CLIENTEID"]?>"><?=$linha["CLIENTEID"]?> - <?=$linha["NOME"]?></option>
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
                            Voce Tem Certeza Que Deseja Remover o Cliente? <br> <?=$linhaesp['NOME']?>
                        </p>
                        <form method="post" name="remover">
                            <input type="hidden" name="clienteid" value="<?=$linhaesp['CLIENTEID']?>">
                            <input type="submit" name="removers" value="Sim" class="btn btn-danger btn-sm">
                            <a href="altera_cliente.php" class="btn btn-secondary btn-sm">Não</a>
                        </form>
                    <?php
                        }
                    ?>
                    <?php
                        if (isset($_POST['atualizar'])) {
                    ?>
                        <form method="post" name="cliente" >
                            <input type="hidden" name="clienteid" value="<?=$linhaesp['CLIENTEID']?>">
                            <label for="nomecliente">Nome do Cliente:</label>
                            <input type="text" name="nome" value="<?=$linhaesp['NOME']?>" class="text-center form-control" required="required">
                            <br>
                            <label for="telefone">Telefone:</label>
                            <input type="tel" name="telefone" value="<?=$linhaesp['TELEFONE']?>" class="text-center form-control" required="required">
                            <br>
                            <table class="mx-5">
                                <tr>
                                    <td class="cliente">
                                        <label for="pais">País:</label>
                                        <input type="text" name="pais" value="<?=$linhaesp['PAIS']?>" class="text-center form-control" required="required">
                                    </td>
                                    <td class="cliente">
                                        <label for="estadp">Estado:</label>
                                        <input type="text" name="estado" value="<?=$linhaesp['ESTADO']?>" class="text-center form-control" required="required">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <label for="cidade">Cidade:</label>
                            <input type="text" name="cidade" value="<?=$linhaesp['CIDADE']?>" class="text-center form-control" required="required">
                            <br>
                            <label for="bairro">Bairro:</label>
                            <input type="text" name="bairro" value="<?=$linhaesp['BAIRRO']?>" class="text-center form-control" required="required">
                            <br>
                            <label for="rua">Rua e Numero:</label>
                            <input type="text" name="rua" value="<?=$linhaesp['RUA']?>" class="text-center form-control" required="required">
                            <br>
                            <label for="complemento">Complemento:</label>
                            <input type="text" name="complemento" value="<?=$linhaesp['COMPLEMENTO']?>" class="text-center form-control" required="required">
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