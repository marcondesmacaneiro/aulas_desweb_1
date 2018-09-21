<pre>
<?php


    if (isset($_GET["gravar"])){
        setcookie("meucookie", "valor", time() + 86400, "/");
        setcookie("meucoookie", "valor", time() + 86400, "/");

        echo "cookie gravado";
    }

    print_r($_COOKIE);
?>
</pre>