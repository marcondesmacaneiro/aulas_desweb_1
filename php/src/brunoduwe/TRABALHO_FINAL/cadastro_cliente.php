<?php
    include "conexao.php";
    if (isset($_POST["gravar"])) {
        $cliente = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $pais = $_POST["pais"];
        $estado = $_POST["estado"];
        $cidade = $_POST["cidade"];
        $bairro = $_POST["bairro"];
        $rua = $_POST["rua"];
        $complemento = $_POST["complemento"];
        $query = mysqli_query($conn, "insert into cliente (NOME,TELEFONE,PAIS,ESTADO,CIDADE,BAIRRO,RUA,COMPLEMENTO) values ('$cliente','$telefone','$pais','$estado','$cidade','$bairro','$rua','$complemento')");
        echo "<script language='javascript' type='text/javascript'>alert('Registro Inserido com Sucesso!');window.location.href='cadastro_cliente.php';</script>";
    }
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
                    <td><a href="cadastro_pessoa.php" class="btn btn-primary-outline-active btn-sm" id="menu">Cadastrar Pessoa</a></td>
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
                <h2 class="text-uppercase">
                    Cadastro de Cliente:    
                </h2>
                <hr/>
                <p class="font-weight-bold">
                    Qual o Tipo de Cadastro?
                </p>
                <div class="p-1 rounded bg-secondary float-left">
                    <a href="cadastro_usuario.php" class="btn btn-secondary pessoa btn-sm" id="usuario">Usuário</a>
                    <a href="cadastro_cliente.php" class="btn btn-secondary btn-sm active" id="cliente">Cliente</a>   
                </div>  
                <form method="post" name="cliente" class="text-center container index">
                    <label for="nomecliente">Nome do Cliente:</label>
                    <input type="text" name="nome" placeholder="Digite o Nome do Cliente" class="text-center form-control" required="required">
                    <br>
                    <label for="telefone">Telefone:</label>
                    <input type="tel" name="telefone" placeholder="Digite o Telefone" class="text-center form-control" required="required">
                    <br>
                    <table class="mx-5">
                        <tr>
                            <td class="cliente">
                                <label for="pais">País:</label>
                                <input type="text" name="pais" placeholder="Nome do País" class="text-center form-control" required="required">
                            </td>
                            <td class="cliente">
                                <label for="estadp">Estado:</label>
                                <input type="text" name="estado" placeholder="Nome do Estado" class="text-center form-control" required="required">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <label for="cidade">Cidade:</label>
                    <input type="text" name="cidade" placeholder="Digite a Cidade" class="text-center form-control" required="required">
                    <br>
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" placeholder="Digite o Bairro" class="text-center form-control" required="required">
                    <br>
                    <label for="rua">Rua e Numero:</label>
                    <input type="text" name="rua" placeholder="Digite a Rua e o Numero" class="text-center form-control" required="required">
                    <br>
                    <label for="complemento">Complemento:</label>
                    <input type="text" name="complemento" placeholder="Informe o Complemento" class="text-center form-control" required="required">
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