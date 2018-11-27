<a href="index.php">Tela Inicial</a>
<hr>
<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
        $update = "update produto 
                    set descricao = '{$_POST['descricao']}',
                        caracteristica = '{$_POST['caracteristica']}',
                        barras = '{$_POST['barras']}',
                        precovenda = '{$_POST['precovenda']}',
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
    Descricao: <input type="text" name="descricao" 
               value="<?=$linha['descricao']?>">
               </br>
    Caracteristica: <input type="text" name="caracteristica" 
               value="<?=$linha['caracteristica']?>">
    <br>
    Barras: <input type="text" name="barras" 
               value="<?=$linha['barras']?>">
    <br>
    Preco de Venda: <input type="text" name="precovenda" 
               value="<?=$linha['precovenda']?>">
    <br>
    Observacao: <input type="text" name="obs" 
               value="<?=$linha['obs']?>">
    <br>
    Tempo: <input type="text" name="tempo" 
               value="<?=$linha['tempo']?>">
   <br>
    Unidade de Medida: <input type="text" name="und_v" 
               value="<?=$linha['und_v']?>">
   <br>

    <input type="submit" name="atualizar" value="Atualizar Cadastro">
</form>