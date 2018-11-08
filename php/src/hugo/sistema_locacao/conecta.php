<?php

$conn = pg_connect("host = localhost port = 5432 dbname = locacao user = postgres passaword=hoffmannhugo")|| die ("Não foi possível conectar ao servidor PostGreSQL");
echo "Conexão efetuada com sucesso";
