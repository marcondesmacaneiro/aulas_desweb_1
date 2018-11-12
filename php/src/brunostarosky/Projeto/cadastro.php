<?php
    include "conexao.php";
?>

<?php
    include "conexao.php";
 
    if (isset($_POST["gravar"])) {
      
        $email = $_POST["email"];
        $nome = $_POST["nome"];
        $senha = $_POST["senha"];
        $jogo = $_POST["jogo"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];

          $query = "insert into pessoa (email,nome,senha,jogo,cidade,estado) 
          values ('{$email}','{$nome}','{$senha}','{$jogo}','{$cidade}','{$estado}')";
                     if (mysqli_query($conn, $query)) {
                        echo "Registro gravado com sucesso!"; 
                }
            }
?>
            

<p>Complete os campos a seguir para se cadastras e começar a comprar!</p>

<form method="post">
    Email:
    <input type="text" name="email">
    <br />
    <br />
    Nome:
    <input type="text" name="nome">
    <br />
    <br />
    Senha:
    <input type="password" name="senha">
    <br />
    <br />
    Seu jogo favorito:
    <input type="text" name="jogo">
    <br />
    <br />
    Cidade que você mora:
    <input type="text" name="cidade">
    <br />
    <br />
    Estado que você mora:
    <input type="text" name="cidade">
    <br />
    <br />
    <input type="submit" name="gravar" value="Gravar">
</form>

<a href="mypage.php">Aṕos o cadastro clique aqui para ir para sua pagina e comprar!</a>

