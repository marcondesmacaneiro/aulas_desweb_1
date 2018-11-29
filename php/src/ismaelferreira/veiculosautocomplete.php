<?php
session_start();

$cnpj = $_SESSION["cnpj"];

$term = $_GET["term"];

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");

$sql = "SELECT * FROM veiculos WHERE cnpj = '$cnpj' AND (placa ILIKE '%$term%')";

$results = pg_query($dbconn, $sql);

$data = [];

while ($result = pg_fetch_object($results)) {
    $data[] = [
        "label" => $result->placa,
        "id" => $result->veiculo
    ];
}
echo json_encode($data);