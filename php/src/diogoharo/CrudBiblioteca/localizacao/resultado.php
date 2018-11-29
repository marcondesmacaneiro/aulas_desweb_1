<?php
header('Content-Type: text/html; charset=utf-8');

use app\model\Localizacao;

$oLocalizacao = new Localizacao;
$aLocalizacao = $oLocalizacao->listar();
echo "<form name='form1' id='form1' method='' action=''>";

echo "<table id='tabela' class='table'>
        <thead>
            <tr>
                <th></th>
                <th>Código</th>
                <th>Localização</th>
            </tr></thead><tbody>";

foreach ($aLocalizacao as $oLoc) {
    echo "<tr><td><input type='checkbox' value='" . $oLoc->getLoccodigo() . "'"
    . "name='checkbox[]' id='checkbox[]'></td>"
    . '<td>' . $oLoc->getLoccodigo() . '</td>'
    . '<td>' . $oLoc->getLocnome() . '</td>'
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
            <label for="localizacao">Localização:</label>
            <br>
            <input type="text" id="localizacao" name="localizacao" class="form-control"
                   placeholder="Informe a Localização">
            <br>
        </div>
    </div>
    <input type="submit" value="Enviar" onclick="enviar()" class="btn btn-success">
    <input type="reset" value="Cancelar" class="btn btn-default">
</form>
<br/>
<br/>
<div id="mensagem">
    <?php
    echo isset($sMensagem) ? $sMensagem : '';
    ?>
</div>