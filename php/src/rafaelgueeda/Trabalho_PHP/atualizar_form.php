<a href="index.php">Tela Inicial</a>
<hr>
<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
        $update = "update produto 
                    set descricao = '{$_POST['descricao']}',
                        caracteristica = '{$_POST['caracteristica']}',
                        barras = '{$_POST['barras']}',
                        preco_venda = '{$_POST['preco_venda']}',
                        obs ='{$_POST['obs']}',
                        tempo = '{$_POST['tempo']}',
                        und_v = '{$_POST['und_v']}'
                    where codigo = {$_GET["codigo"]}
                    ";
                    
        mysqli_query($conn, $update);
    }
    
    $sql = "select * from produto where codigo =".$_GET['codigo'];
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);
?>


<form method="post">
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
    <br>
    <input type="submit" name="atualizar" value="atualizar">
</form>