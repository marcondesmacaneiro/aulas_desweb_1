<?php
session_start();

$cnpj = $_SESSION["cnpj"];
$saida = $_POST["saida"];
$destino = $_POST["destino"];
$veiculo = $_POST["veiculo"];
$motorista = $_POST["motorista"];

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");

$sql = "INSERT INTO viagens (cnpj, saida, destino) VALUES ('$cnpj', '$saida', '$destino') RETURNING viagem";

$insert = pg_query($dbconn, $sql);

$viagem = pg_fetch_object($insert)->viagem;

$sql = "INSERT INTO viagens_veiculos_motoristas (cnpj, viagem, veiculo, usuario) VALUES ('$cnpj', '$viagem', '$veiculo', '$motorista')";

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