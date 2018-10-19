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
            echo "registro alterado com sucesso";
        }
    }

?>


<form method="post">
    Primeiro nome:
    <br>
    <input type="text" name="primeiro_nome">
    <br>
    Segundo nome:
    <br>
    <input type="text" name="segundo_nome">
    <br>
    Email:
    <br>
    <input type="text" name="email">
    <br>
    Cidade:
    <br>
    <input type="text" name="cidade">
    <br>
    Estado:
    <br>
    <input type="text" name="estado">
    <br>

    <input type="submit" name="alterar" value="Alterar">
    <br>
    

</form>