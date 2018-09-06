<?php
//até funciona
$dir = "./";
foreach (glob($dir."*", GLOB_ONLYDIR) as $pastas) {
	if (is_dir ($pastas)) {
        $pasta = str_replace ($dir,"",$pastas);
        echo "<a href=\"{$pasta}\">{$pasta}</a>";
        echo "<br />";
	}
}
?>