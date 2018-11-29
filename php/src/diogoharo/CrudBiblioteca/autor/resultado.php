<?php

use app\model\Autor;

header('Content-Type: text/html; charset=utf-8');
$oAutor = new Autor;
$aAutor = $oAutor->listar();
echo "<form name='form1' id='form1' >";

echo "<table id='tabela' class='table'>
        <thead>
            <tr>
                <th></th>
                <th>Código</th>
                <th>Autor</th>
            </tr></thead><tbody>";

foreach ($aAutor as $oAut) {
    echo "<tr><td><input type='checkbox' value='" . $oAut->getAutcodigo() . "'"
    . "name='checkbox[]' id='checkbox[]'></td>"
    . '<td>' . $oAut->getAutcodigo() . '</td>'
    . '<td>' . $oAut->getAutnome() . '</td>'
    . "</tr>";
}


echo "  </tbody>
    </table>";
?>

<input type="submit"  value="Excluir" onclick="deletar()" class="btn btn-danger">
<input type="submit"  value="Selecionar" onclick="selecionar()"  class="btn btn-info">

</form>
<form  class="form-signin" method="" action="" id="form-salvar">
    <input type="hidden" id="codigo" name="codigo">
    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="autor">Autor:</label>
            <br>
            <input type="text" id="autor" name="autor" class="form-control"
                   placeholder="Informe o autor">
            <br>
        </div>
    </div>
    <input type="submit" value="Enviar" onclick="enviar()" class="btn btn-success">
    <input type="reset" value="Cancelar" class="btn btn-dark">
</form>
<br/>
<br/>
<div id="mensagem">
    <?php
    echo isset($sMensagem) ? $sMensagem : '';
    ?>
</div>