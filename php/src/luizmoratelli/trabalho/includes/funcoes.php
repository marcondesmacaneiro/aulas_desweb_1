<?php
function executarComandoBanco($conn, $sql) {
    $query = pg_query($conn, $sql);
    return $query;
}
function verificarLogado() {
    if ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == 'localhost') {
        $diretorioSite = 'C:\xampp\htdocs\marcondes\aulas_desweb_1\php\src\luizmoratelli\trabalho';
        $linkSite = 'localhost/marcondes/aulas_desweb_1/php/src/luizmoratelli/trabalho';
    }

    if (!isset($_SESSION['userId'])) {
        header("Location: http://$linkSite?error=error-login");
    }
}