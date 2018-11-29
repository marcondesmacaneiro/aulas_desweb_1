<a href="menu.php">Tela Inicial</a>
<a href="listagemdespesa.php">Listagem de Despesa</a>
<hr>
<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
        $update = "update despesa 
                    set descricao = '{$_POST['descricao']}',
                        valor = '{$_POST['valor']}',
                    where iddespesa = '{$_GET['iddespesa']}'
                      ";

                    
        
        if (mysqli_query($conn, $update)) {
            echo "Registro alterado com sucesso!";
        }else{
            echo "Registro não pode ser alterado!";
        }
    }
    
    $sql = "select * from despesa where iddespesa =".$_GET['iddespesa'];
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