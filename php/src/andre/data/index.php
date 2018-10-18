

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <table border='1'>
            <tr>
                <td>ID</td>
                <td>Primeiro Nome</td>
                <td>Segundo Nome</td>
                <td>email</td>
                <td>Cidade</td>
                <td>Estado</td>
                <td>Ações</td>
            </tr>
                <?php

                include "conexao.php";

                $sql = 'select * from pessoa';
                $query = mysqli_query($conn, $sql);


                while ($linha = mysqli_fetch_array($query)) {
                    echo $linha['primeiro_nome'].'<br>';
?>
                    
            <tr>
                    <td><?=$linha['id']; ?></td>
                    <td><?=$linha['primeiro_nome']; ?></td>
                    <td><?=$linha['segundo_nome']; ?></td>
                    <td><?=$linha['email']; ?></td>
                    <td><?=$linha['cidade']; ?></td>
                    <td><?=$linha['estado']; ?></td>

                    <td>ações</td>
                
            </tr>
                <?php
                    }
                        
    

                ?>
            
                
        </table>
    
</body>
</html>