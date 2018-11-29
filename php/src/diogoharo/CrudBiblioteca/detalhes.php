<html>
    <head>
        <title>Detalhes</title>
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/jquery-estilo.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav>
            <img src="assets/imagens/trabalhophp.png"/>
        </nav>

        <?php
        header("Content-Type: text/html; charset=utf-8");
        $verifica['genero'] = false;
        $verifica['livro'] = true;
        $verifica['localizacao'] = false;
        $verifica['autor'] = false;
        $verifica['livroautor'] = false;
        include'menu.php';
        require_once 'config.php';

        use app\model\Livro;
        use app\model\Localizacao;
        use app\model\Genero;
        use app\model\Autor;

header('Content-Type: text/html; charset=utf-8');
        $check = $_POST['checkbox'][0];
        $oLivro = new Livro;
        $aLivro = $oLivro->listarSelecionados($check);

        echo ""
        . "<div id='resultado'>"
        . "<form name='form1' id='form1' method='POST' action='' class='form-signin'>";

        echo "<table id='tabela' class='table'>
                   <thead>
                       <tr>
                           <th>Código</th>
                           <th>Livro</th>
                           <th>Gênero</th>
                           <th>Localização</th>
                       </tr></thead><tbody>";

        echo "<tr>"
        . '<td>' . $aLivro[0]->getLivcodigo() . '</td>'
        . '<td>' . $aLivro[0]->getLivnome() . '</td>'
        . '<td>' . $aLivro[0]->getGenero()->getGennome() . '</td>'
        . '<td>' . $aLivro[0]->getLocalizacao()->getLocnome() . '</td>'
        . "</tr>";


        echo " </tbody>
               </table>";
        ?>


    </form>
</div>
<div>
    <?php
    echo "<table id='tabela' class='table'>
                   <thead>
                       <tr>
                           <th>Autores</th>
                       </tr></thead><tbody>";
    foreach ($aLivro as $oAut) {
        $oAutor = new Autor();
        echo "<tr>"
        . '<td>' . $oAut->getAutor()->getAutnome() . '</td>'
        . "</tr>";
    }
    echo "  </tbody>
               </table>";
    ?>
</div>
<div id="mensagem">
    <?php
    echo isset($sMensagem) ? $sMensagem : '';
    ?>
</div>
</div>
</body>
</html>





