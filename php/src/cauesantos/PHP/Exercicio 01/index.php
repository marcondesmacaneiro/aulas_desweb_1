<?php

$aValores = [
    'email' => $_POST['email'],
    'senha' => $_POST['senha']
];

echo '<h2>' . $aValores['email'] . '</h2>';
echo '<h2>' . $aValores['senha'] . '</h2>';