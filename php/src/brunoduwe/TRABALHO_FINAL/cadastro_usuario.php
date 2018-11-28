<?php
    include "conexao.php";
    if (isset($_POST["gravar"]) and $_POST["senha1"] <> $_POST["senha2"]) {
        echo "<script language='javascript' type='text/javascript'>alert('As Senhas Inseridas São Diferentes!');</script>";
    }
    if (isset($_POST["gravar"]) and $_POST["senha1"] == $_POST["senha2"]) {
        $nome = $_POST["nome"];
        $usuario = $_POST["usuario"];
        $senha = md5($_POST['senha1']);
        $query = mysqli_query($conn, "insert into usuario (NOME,USUARIO,SENHA) values ('$nome','$usuario','$senha')");
        echo "<script language='javascript' type='text/javascript'>alert('Registro Inserido com Sucesso!');window.location.href='cadastro_usuario.php';</script>";
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
                    Cadastro de Usuario:    
                </h2>
                <hr/>
                <p class="font-weight-bold">
                    Qual o Tipo de Cadastro?
                </p>
                <div class="p-1 rounded bg-secondary float-left">
                    <a href="cadastro_usuario.php" class="btn btn-secondary btn-sm active" id="usuario">Usuário</a>
                    <a href="cadastro_cliente.php" class="btn btn-secondary pessoa btn-sm" id="cliente">Cliente</a>   
                </div>  
                <form method="post" name="user" class="text-center container index">
                    <label for="nomeusuario">Nome do Usuário</label>
                    <input type="text" name="nome" placeholder="Digite o Nome do Usuário" class="text-center form-control" required="required">
                    <br>
                    <label for="usuario">Usuário</label>
                    <input type="text" name="usuario" placeholder="Digite o Login Do Usuário" class="text-center form-control" required="required">
                    <br>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha1" placeholder="Digite a Senha" class="text-center form-control" required="required">
                    <br>
                    <label for="confirmasenha">Confirmar Senha:</label>
                    <input type="password" name="senha2" placeholder="Confirme a Senha" class="text-center form-control" required="required">
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