<?php
    session_start();
    include_once './config.inc';
    include_once './conexao.php';
    include_once './mail.inc';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sistema</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href='../estilo/estiloHome.css'>
        <script type="text/javascript" src="../js/validaCampo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <header>
        <h2>Locação de carros</h2>
        <img src="../img/logo.png" >
    </header>
    <nav>
        <ul>
            <?php
                $sUser = unserialize($_SESSION['usuario']);
            // verificação necessária para mostragem do menu para o cliente logado, 
            // sendo que o mesmo só poderá verificar se possui pedidos
                if($sUser=='adm'){
                    echo '<li><a href="index.php?pagina=home">Início</a></li>
                            <li><a href="index.php?pagina=clientes">Clientes</a></li>
                            <li><a href="index.php?pagina=carros">Carros</a></li>
                            <li><a href="index.php?pagina=pedidos">Pedidos</a></li>
                            <li><a href="index.php?pagina=pessoas">Pessoas</a></li>
                            <li><a href="../login.php">Sair</a></li>';
                }
                // neste caso o usuário logado será o adm,
                // sendo que o mesmo tem todos os privilégios
                else{
                                 // passagem de parâmentro abaixo para que a página home fique acessível   
                                 // o mesmo acontece com o restante das opções
                    echo'
                        <li><a href="index.php?pagina=home">Início</a></li>
                        <li><a href="index.php?pagina=pedidos">Pedidos</a></li>
                        <li><a href="../login.php">Sair</a></li>';        
                }
            ?>
        </ul>
    </nav>

<?php
    // inclusão do arquivo verifica.inc, sendo que o mesmo será responsável pelo carregamento das páginas restantes
    // de acordo com o que será passado como parâmentro via get pelo menu
    include_once './verifica.inc';
?>
    <footer><hr>Todos os direitos reservados</footer>
</html>