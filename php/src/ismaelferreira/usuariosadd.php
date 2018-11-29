<?php
session_start();

$cnpj = $_SESSION["cnpj"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");

$sql = "INSERT INTO usuarios (cnpj, nome, email, senha) VALUES ('$cnpj', '$nome', '$email', '$senha')";

$insert = pg_query($dbconn, $sql);

if ($insert != 0) {
    echo json_encode([
        "success" => true
    ]);
    header("HTTP/1.0 200 OK");
} else {
    echo json_encode([
        "success" => false
    ]);
    header("HTTP/1.0 500");
}