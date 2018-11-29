<?php
session_start();

$cnpj = $_SESSION["cnpj"];
$placa = $_POST["placa"];
$lotacao = $_POST["lotacao"];

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");

$sql = "INSERT INTO veiculos (cnpj, placa, lotacao) VALUES ('$cnpj', '$placa', '$lotacao')";

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