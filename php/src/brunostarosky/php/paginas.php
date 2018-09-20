<?php
    if (!isset($_GET["pagina"]) == "home"){
        include "boasvindas.php";
    } else {
        include ($_GET["pagina"].".php");
    }
?>