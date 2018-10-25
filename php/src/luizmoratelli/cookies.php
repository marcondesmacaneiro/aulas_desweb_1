<?php

//setcookie($name, $value, $unixTime, $path);

if (isset($_GET['gravar'])) {
    setcookie('meu-cookie', 'valor', time() + 86400, '/');
    echo "cookie gravado";
}

print_r($_COOKIE);