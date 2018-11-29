<?php

use app\model\Livro;
use app\model\Localizacao;
use app\model\Genero;

header('Content-Type: text/html; charset=utf-8');
$oLivro = new Livro;
$aLivros = $oLivro->listar();

echo "<form name='form1' id='form1' method='POST' action='detalhes.php' class='form-signin'>";

echo "<table id='tabela' class='table'>
        <thead>
            <tr>
                <th></th>
                <th>Código</th>
                <th>Livro</th>
            </tr></thead><tbody>";

foreach ($aLivros as $oLiv) {
    echo "<tr><td><input type='checkbox' value='" . $oLiv->getLivcodigo() . "'"
    . "name='checkbox[]' id='checkbox[]'></td>"
    . '<td>' . $oLiv->getLivcodigo() . '</td>'
    . '<td>' . $oLiv->getLivnome() . '</td>'
    . "</tr>";
}


echo "  </tbody>
    </table>";
?>

<input type="submit"  value="Excluir" onclick="deletar()" class="btn btn-danger">
<input type="submit"  value="Selecionar"  class="btn btn-primary">
<input type="button" value="Novo" onclick="direcionar()" class="btn btn-success">
</form>
<br/>
<br/>
<div id="mensagem">
    <?php
    echo isset($sMensagem) ? $sMensagem : '';
    ?>
</div>

