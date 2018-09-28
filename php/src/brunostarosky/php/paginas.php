<?php
    if (!isset($_GET["pagina"])){
        include "boasvindas.php";
    } else {
        include ($_GET["pagina"].".php");
    }
?>