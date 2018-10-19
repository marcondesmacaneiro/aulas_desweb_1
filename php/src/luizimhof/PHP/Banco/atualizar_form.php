<a href="banco.php"> Voltar</a>
<hr>

<?php
    include "conexao.php";
    #var_dump($_POST);

    if(isset($_POST['alterar'])){
        $nome = $_POST["primeiro_nome"];
        $segundonome = $_POST["segundo_nome"];
        $email = $_POST["email"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        //echo $nome;
        $query = "UPDATE pessoa SET 
                    primeiro_nome = '{$nome}', segundo_nome = '{$segundonome}'
                    , email = '{$email}', cidade = '{$cidade}', estado = '{$estado}' WHERE id = ".$_GET['id'];
        ?><br>
        <?php
        #echo $query;
        if ( mysqli_query($conn, $query)){
            
            ?>
                <a href="banco.php">Pessoa alterada, clique para voltar</a>
            <?php
            #exit();
        }
        
    }
    $query = "SELECT * FROM pessoa WHERE id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);
    $linha = mysqli_fetch_array($result);

?>


<form method="post">
    Primeiro nome:
    <br>
    <input type="text" name="primeiro_nome" value="<?=$linha[primeiro_nome] ?>"placeholder = "Primeiro nome">
    <br>
    Segundo nome:
    <br>
    <input type="text" name="segundo_nome" value="<?=$linha[segundo_nome] ?>" placeholder = "Segundo nome">
    <br>
    Email:
    <br>
    <input type="text" name="email" value="<?=$linha[email] ?>" placeholder = "Email">
    <br>
    Cidade:
    <br>
    <input type="text" name="cidade" value="<?=$linha[cidade] ?>" placeholder = "Cidade">
    <br>
    Estado:
    <br>
    <input type="text" name="estado" value="<?=$linha[estado] ?>" placeholder = "Estado">
    <br>

    <input type="submit" name="alterar" value="Alterar">
    <br>
    

</form>