<a href="index.php">Tela Inicial</a>
<br>
<a href="listagempedidos.php">Listar Pedidos</a>
<hr>
<?php
    include "conexao.php";
   
?>

<select name="cursos">
    <?php
        $query = "select * from pessoa";
        $resultado = mysqli_query($query,$conn);
        while($dados = mysql_fetch_array($resultado))[
            $codigo = $dados['codigo'];
            $primeiro_nome = $dados['primeiro_nome'];
            echo "<option value='$codigo'>$codigo</option>";
        ]

        ?>

</select>