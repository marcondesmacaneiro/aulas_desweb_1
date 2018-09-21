<?php

echo '<pre>';

if ($_GET['gravarCookie']) {
    setcookie('caueSantos', 2018, time() + 86400, '/');
    echo '<script>alert("Cookie Gravado com Sucesso!!")</script>';
}

