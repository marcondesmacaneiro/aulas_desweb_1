<?php
session_start();

$search = $_GET["search"]["value"];
$cnpj = $_SESSION["cnpj"];

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");


$dados = "SELECT saida, destino FROM viagens WHERE cnpj LIKE '$cnpj'";
$total = "SELECT COUNT(saida) FROM viagens WHERE cnpj LIKE '$cnpj'";
$filtrado = "SELECT COUNT(saida) FROM viagens WHERE cnpj LIKE '$cnpj'";

if ($search) {
    $dados .= " AND (saida ILIKE '%$search%' OR destino ILIKE '%$search%')";
    $filtrado .= " AND (saida ILIKE '%$search%' OR destino ILIKE '%$search%')";
}

$querydados = pg_query($dbconn, $dados);
$querytotal = pg_query($dbconn, $total);
$queryfiltrado = pg_query($dbconn, $filtrado);

$total = pg_fetch_object($querytotal)->count;
$filtrado = pg_fetch_object($queryfiltrado)->count;

$dados = [];

while ($resultados = pg_fetch_object($querydados)) {
    $dados[] = $resultados;
}

echo json_encode(
    array(
        "draw" => (int)$_GET['draw'],
        "recordsTotal" => $total,
        "recordsFiltered" => $filtrado,
        "data" => $dados,
    )
);