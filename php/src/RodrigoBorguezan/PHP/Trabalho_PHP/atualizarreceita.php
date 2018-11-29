<a href="menu.php">Tela Inicial</a>
</br>
<a href="listagemreceita.php">Listagem de Receita</a>
<hr>
<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
        $update = "update receita 
                    set descricao = '{$_POST['descricao']}',
                        valor = '{$_POST['valor']}',
                    where idreceita = '{$_GET['idreceita']}'";

                    
        
        if (mysqli_query($conn, $update)) {
            echo "Registro alterado com sucesso!";
        }else{
            echo "Registro não pode ser alterado!'{$_GET['idreceita']}'";
        }
    }
    
    $sql = "select * from receita where idreceita =".$_GET['idreceita'];
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);
?>


<form method="post">
    Descricao: <input type="text" name="descricao" 
               value="<?=$linha['descricao']?>">
               </br>
    Valor: <input type="text" name="valor" 
               value="<?=$linha['valor']?>">
    <br>
    

    <input type="submit" name="atualizar" value="Atualizar Despesa">
</form>