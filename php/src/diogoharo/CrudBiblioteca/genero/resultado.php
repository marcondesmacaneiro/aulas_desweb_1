<?php

use app\model\Genero;

header('Content-Type: text/html; charset=utf-8');
$oGenero = new Genero;
$aGeneros = $oGenero->listar();

echo "<form name='form1' id='form1' method='' action=''>";

echo "<table id='tabela' class='table'>
        <thead>
            <tr>
                <th></th>
                <th>Código</th>
                <th>Genero</th>
            </tr></thead><tbody>";

foreach ($aGeneros as $oGen) {
    echo "<tr><td><input type='checkbox' value='" . $oGen->getGencodigo() . "'"
    . "name='checkbox[]' id='checkbox[]'></td>"
    . '<td>' . $oGen->getGencodigo() . '</td>'
    . '<td>' . $oGen->getGennome() . '</td>'
    . "</tr>";
}


echo "  </tbody>
    </table>";
?>

<input type="submit"  value="Excluir" onclick="deletar()" class="btn btn-danger">
<input type="submit"  value="Selecionar" onclick="selecionar()" class="btn btn-primary">

</form>
<form  class="form-signin" method="" action="" id="form-salvar">
    <input type="hidden" id="codigo" name="codigo">
    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="genero">Gênero:</label>
            <br>
            <input type="text" id="genero" name="genero" class="form-control"
                   placeholder="Informe o Genero">
            <br>
        </div>
    </div>
    <input type="submit" value="Enviar" onclick="enviar()" class="btn btn-success">
    <input type="reset" value="Cancelar"  class="btn btn-default">
</form>
<br/>
<br/>
<div id="mensagem">
    <?php
    echo isset($sMensagem) ? $sMensagem : '';
    ?>
</div>