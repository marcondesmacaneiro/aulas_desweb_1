    <?php
    if($_GET["gravar"]) {
        setcookie("meu-cookie", "valor", time() + 86400, "/");
        echo "Cookie gravado";
    }
    print_r($_COOKIE)
?>