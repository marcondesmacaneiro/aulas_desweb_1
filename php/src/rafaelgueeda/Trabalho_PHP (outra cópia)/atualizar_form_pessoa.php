<a href="index.php">Tela Inicial</a>
<br>
<a href="listagempessoas.php">Listagem de Pessoas</a>
<hr>
<?php
    include "conexao.php";

    if (isset($_POST['atualizar'])) {
        $update = "update pessoa 
                    set primeiro_nome = '{$_POST['primeiro_nome']}',
                        sobrenome = '{$_POST['sobrenome']}',
                        documento = '{$_POST['documento']}',
                        email = '{$_POST['email']}',
                        telefone ='{$_POST['telefone']}',
                        logradouro = '{$_POST['logradouro']}',
                        cidade = '{$_POST['cidade']}',
                        complemento = '{$_POST['complemento']}'
                    where codigo = {$_GET["codigo"]}
                      ";
                   
        mysqli_query($conn, $update);
    }
    
    $sql = "select * from pessoa where codigo =".$_GET['codigo'];
    $resultado = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_array($resultado);
?>


<form method="post">
    Primeiro Nome: <input type="text" name="primeiro_nome" 
               value="<?=$linha['primeiro_nome']?>">
        </br>
    Sobrenome: <input type="text" name="sobrenome" 
               value="<?=$linha['sobrenome']?>">
    <br>
    Documento: <input type="text" name="documento" 
               value="<?=$linha['documento']?>">
    <br>
    E-mail: <input type="text" name="email" 
               value="<?=$linha['email']?>">
    <br>
    Telefone: <input type="text" name="telefone" 
               value="<?=$linha['telefone']?>">
    <br>
    Logradouro: <input type="text" name="logradouro" 
               value="<?=$linha['logradouro']?>">
   <br>
    Cidade: <input type="text" name="cidade" 
               value="<?=$linha['cidade']?>">
   <br> 
   Complemento: <input type="text" name="complemento" 
               value="<?=$linha['complemento']?>">
   <br>

    <input type="submit" name="atualizar" value="Atualizar Cadastro">
</form>