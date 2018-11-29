<a href="menu.php">Tela Inicial</a>
<br>
<a href="listagemreceita.php">Listagem de Receita</a>
<hr>
<?php
    include "conexao.php";
  

    if (isset($_POST["gravar"])) {
        
        $descricao = $_POST["descricao"];
        $valor = $_POST["valor"];


        $query = "insert into receita (descricao,valor)
        values ('{$descricao}','{$valor}')";
       
                      if (mysqli_query($conn, $query)) {
            echo "Registro gravado com sucesso!";
        }
    }
?>
<form method="post">
    Descricao:    <input type="text" name="descricao">
    <br>
    Valor:  <input type="text" name="valor">
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>