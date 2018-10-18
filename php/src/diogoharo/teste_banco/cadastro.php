
    
    <form action="" method="POST">
    <label for="primeiro_nome">Nome:</label>
    <input type='text' name="primeiro_nome">
    <br/>
    <input type='submit' name='gravar' value='Gravar'>
    </form>


<?php
    require "../conexao.php";
    if(isset($_POST["gravar"])) {
        $sNome = $_POST["primeiro_nome"];

        $sSql = "insert into pessoa (primeiro_nome) value ('{$sNome}')";
        $oRes = mysqli_query($conn,$sSql);
        if($oRes) {
            echo "Registro incluído com sucesso!";
        }
        else {
            echo "Não foi possível incluir no banco!";
        }

    }
    


?>