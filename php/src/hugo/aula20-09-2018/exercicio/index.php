<pre>
<?php
 //   print_r($_SERVER)
    //Escrita
    //setcookie($name, $value, $unixTime, $path)
    //Leitura
    //$_COOKIE[$nome]
    if ($_GET["gravar"]){
        setcookie("meu-cookie", "valor", time() + 86400, "/");
        echo "cookie gravado";
    }
    print_r($_COOKIE)
?>
</pre>