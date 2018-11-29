<?php

session_start();

$dbconn = pg_connect("host=postgres port=5432 dbname=isma user=isma password=isma");

$email = $_POST["email"];
$senha = $_POST["senha"];

$query = pg_query($dbconn, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' LIMIT 1");


$resultado = pg_fetch_object($query);

if ($resultado) {
    $_SESSION["valid"] = true;
    $_SESSION["cnpj"] = $resultado->cnpj;
    $_SESSION["nome"] = $resultado->nome;
    $_SESSION["email"] = $resultado->email;

    echo json_encode([
        "success" => true
    ]);
    header("HTTP/1.0 200 OK");
} else {
    echo json_encode([
        "success" => false
    ]);
    header("HTTP/1.0 401 Unauthorized");
}