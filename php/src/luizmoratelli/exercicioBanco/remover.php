<?php
require_once('conexao.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if ($id) {
    $sql = "DELETE FROM pessoa
             WHERE id = {$id}";

    if (!mysqli_query($conn, $sql)) {
        echo "Erro";
    }
} 

header('location: listagem.php');