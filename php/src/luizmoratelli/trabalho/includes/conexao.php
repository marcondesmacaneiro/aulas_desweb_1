<?php 
$db_host = 'localhost';
$db_port = '5432';
$db_name = 'trabalho';
$db_user = 'postgres';
$db_pass = 'postgres';
$conn = pg_connect("host=$db_host port=$db_port dbname=$db_name user=$db_user password=$db_pass");