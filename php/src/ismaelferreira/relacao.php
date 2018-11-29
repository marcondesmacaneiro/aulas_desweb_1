<?php
session_start();

$search = $_GET["search"]["value"];
$cnpj = $_SESSION["cnpj"];

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");


$dados = "SELECT vi.saida, vi.destino, us.nome AS motorista, ve.placa
FROM viagens_veiculos_motoristas vvm JOIN veiculos ve ON vvm.veiculo = ve.veiculo
JOIN viagens vi ON vvm.viagem = vi.viagem
JOIN usuarios us ON vvm.usuario = us.usuario
WHERE vi.cnpj LIKE '$cnpj' AND us.cnpj LIKE '$cnpj' AND vvm.cnpj LIKE '$cnpj'";


$total = "SELECT COUNT(vi.saida)
FROM viagens_veiculos_motoristas vvm JOIN veiculos ve ON vvm.veiculo = ve.veiculo
JOIN viagens vi ON vvm.viagem = vi.viagem
JOIN usuarios us ON vvm.usuario = us.usuario
WHERE vi.cnpj LIKE '$cnpj' AND us.cnpj LIKE '$cnpj' AND vvm.cnpj LIKE '$cnpj'";

$filtrado = "SELECT COUNT(vi.saida)
FROM viagens_veiculos_motoristas vvm JOIN veiculos ve ON vvm.veiculo = ve.veiculo
JOIN viagens vi ON vvm.viagem = vi.viagem
JOIN usuarios us ON vvm.usuario = us.usuario
WHERE vi.cnpj LIKE '$cnpj' AND us.cnpj LIKE '$cnpj' AND vvm.cnpj LIKE '$cnpj'";

if ($search) {
    $dados .= " AND (us.nome ILIKE '%$search%' OR ve.placa ILIKE '%$search%' OR vi.saida ILIKE '%$search%' OR vi.destino ILIKE '%$search%')";
    $filtrado .= " AND (us.nome ILIKE '%$search%' OR ve.placa ILIKE '%$search%' OR vi.saida ILIKE '%$search%' OR vi.destino ILIKE '%$search%')";
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