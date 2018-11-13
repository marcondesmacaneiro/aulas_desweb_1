<a href="index.php">Tela Inicial</a>
<hr>
<?php
    include "conexao.php";
  

    if (isset($_POST["gravar"])) {
        
        $descricao = $_POST["descricao"];
        $caracteristica = $_POST["caracteristica"];
        $und_v = $_POST["und_v"];
        $barras = $_POST["barras"];
        $precovenda = $_POST["precovenda"];
        $obs = $_POST["obs"];
        $tempo = $_POST["tempo"];

        $query = "insert into produto (descricao,caracteristica,und_v,barras,precovenda,obs,tempo)
        values ('{$descricao}','{$caracteristica}','{$und_v}','{$barras}','{$precovenda}','{$obs}','{$tempo}')";
        echo $query;
                      if (mysqli_query($conn, $query)) {
            echo "Registro gravado com sucesso!";
        }
    }
?>

    Descricao:    <input type="text" name="descricao">
    <br>
    caracteristica:  <input type="text" name="caracteristica">
    <br>
    Unidade de Venda:   <input type="text" name="und_v">
    <br>
    Barras:   <input type="text" name="barras">
    <br>
    Preco de Venda: <input type="text" name="precovenda">
    <br>
    Observaçao:  <input type="text" name="obs">    
    <br>
    Tempo Mínimo:  <input type="text" name="tempo">    
    <br>
    <input type="submit" name="gravar" value="Gravar">
</form>