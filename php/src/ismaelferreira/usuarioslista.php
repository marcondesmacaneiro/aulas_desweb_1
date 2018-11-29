<?php
session_start();

$search = $_GET["search"]["value"];
$cnpj = $_SESSION["cnpj"];

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");


$dados = "SELECT nome, email FROM usuarios WHERE cnpj LIKE '$cnpj'";
$total = "SELECT COUNT(nome) FROM usuarios WHERE cnpj LIKE '$cnpj'";
$filtrado = "SELECT COUNT(nome) FROM usuarios WHERE cnpj LIKE '$cnpj'";

if ($search) {
    $dados .= " AND (nome ILIKE '%$search%' OR email ILIKE '%$search%')";
    $filtrado .= " AND (nome ILIKE '%$search%' OR email ILIKE '%$search%')";
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