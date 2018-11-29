<?php
session_start();

$cnpj = $_SESSION["cnpj"];

$term = $_GET["term"];

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");

$sql = "SELECT * FROM usuarios WHERE cnpj = '$cnpj' AND (nome ILIKE '%$term%' OR email ILIKE '%$term%')";

$results = pg_query($dbconn, $sql);

$data = [];

while ($result = pg_fetch_object($results)) {
    $data[] = [
        "label" => $result->nome,
        "id" => $result->usuario
    ];
}

echo json_encode($data);