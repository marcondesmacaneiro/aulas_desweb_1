<?php
    include "open.php"

    if($abrir){
       echo '<a href="bemVindo.php">Bem vindo</a>'
    }
    else{
        echo "Senha ou Usuário incorreto!"
        echo '<a href="login.php">Tente novamente</a>'
    }
?>