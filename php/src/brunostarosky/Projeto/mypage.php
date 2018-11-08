<?php
    include "conexao.php";
    
    $query = "select pessoa.jogo from pessoa";
    $result = mysqli_query($conn, $query);
?>

<p>Bem-vindo!</p>

<p>Seus jogos!</p>

<table border="1">
    <tr>
        <td></td>
    
    
    </tr>
</table>

