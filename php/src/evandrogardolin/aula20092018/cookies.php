<pre>
<?php


    if ($_GET["gravar"]){
        setcookie("meucookie", "valor", time() + 86400, "/");
        setcookie("meucoookie", "valor", time() + 86400, "/");

        echo "cookie gravado <br/>";
    }

    print_r($_COOKIE);
?>
</pre>