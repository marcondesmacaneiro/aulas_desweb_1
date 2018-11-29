<html>
    <head>
        <title>Cadastro</title>
        <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/jquery-estilo.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id='resultado' name='resultado'>
            <nav>
                <img src="assets/imagens/trabalhophp.png"/>
            </nav>
            <?php
            $verifica['genero'] = false;
            $verifica['livro'] = true;
            $verifica['localizacao'] = false;
            $verifica['autor'] = false;
            $verifica['livroautor'] = false;
            header("Content-Type: text/html; charset=utf-8");
            include 'menu.php';
            require_once 'config.php';

            use app\model\Autor;
            use app\model\Localizacao;
            use app\model\Genero;

header('Content-Type: text/html; charset=utf-8');
            $oAutor = new Autor;
            $aAutors = $oAutor->listar();

            echo

            "<form name='form1' id='form1' method='' action=''>";

            echo "<table id='tabela' class='table'>
                   <thead>
                       <tr>
                           <th></th>
                           <th>Código</th>
                           <th>Autor</th>
                       </tr></thead><tbody>";

            foreach ($aAutors as $oAut) {
                echo "<tr><td><input type='checkbox' value='" . $oAut->getAutcodigo() . "'"
                . "name='checkbox[]' id='checkbox[]'></td>"
                . '<td>' . $oAut->getAutcodigo() . '</td>'
                . '<td>' . $oAut->getAutnome() . '</td>'
                . "</tr>";
            }


            echo "  </tbody>
               </table>";
            ?>

        </form>
        <form  class="form-signin" method="POST" action="" id="form-salvar">
            <input type="hidden" id="codigo" name="codigo">
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="livro">Livro:</label>
                    <br>
                    <input type="text" id="livro" name="livro" class="form-control"
                           placeholder="Informe o Livro">
                    <br>
                </div>
            </div>
            <label for="select_localizacao">Escolha a Localizacao</label>
            <select id="select_localizacao" name="select_localizacao" class="form-control">
                <option value="">Escolha</option>

                <?php
                $oLocalizacao = new Localizacao();
                $aLocalizacao = $oLocalizacao->listar();
                foreach ($aLocalizacao as $oLoc) {
                    ?>
                    <option value="<?= $oLoc->getLoccodigo() ?>"><?= $oLoc->getLocnome() ?></option>

                <?php }
                ?>
            </select>
            <label for="select_genero">Escolha o Gênero</label>
            <select id="select_genero" name="select_genero" class="form-control">
                <option value="">Escolha</option>

                <?php
                $oGenero = new Genero();
                $aGenero = $oGenero->listar();
                foreach ($aGenero as $oGen) {
                    ?>
                    <option value="<?= $oGen->getGencodigo() ?>"><?= $oGen->getGennome() ?></option>

                <?php }
                ?>
            </select>
            <br/>
            <input type="submit" value="Enviar" onclick="enviar()" class="btn btn-success">
            <input type="reset" value="Cancelar"  class="btn btn-default">
            <input type="button" value="Voltar" class="btn btn-default" onclick="retorna()">
        </form>
        <br/>
        <br/>
        <div id="mensagem">
            <?php
            echo isset($sMensagem) ? $sMensagem : '';
            ?>
        </div>
    </div>
</body>
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/livro.js" type="text/javascript"></script>
</html>



