<?php
header('Content-type: text/html; charset=utf-8');

$oEntrega = new Entrega();
$aEntrega = $oEntrega->listar();

echo "    <div id='resultado' class='container'>";
echo "
    <h2>Entrega</h2>
            <form name='form1' id='form1' >
                <table class='table table-striped' id='tabela'>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Código</th>
                            <th>Tipo de entrega</th>
                        </tr>
                    </thead>
                    <tbody>";

foreach ($aEntrega as $oEnt) {
    echo " 
                    <tr>
                        <td><input type='checkbox' value='" . $oEnt->getCodigo() . "'
                            name='checkbox[]' id='checkbox[]'></td> 
                        <td>" . $oEnt->getCodigo() . "</td> 
                        <td>" . $oEnt->getTipo() . "</td> 
                    </tr>";
}

echo "
                    </tbody>
                </table>";
?>

<input type="submit" value="Selecionar" class="btn btn-primary" onclick="selecionar()">
<input type="submit" value="Excluir" class="btn btn-danger" onclick="deletar()">
</form>

<form class="form-signin" method="" action="" id="form-salvar">
    <input type="hidden" id="codigo" name="codigo">
    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="entrega">Tipo da entrega:</label>
            <br>
            <input type="text" class="form-control" id="entrega" name="entrega" 
                   placeholder="Informe a entrega" >
        </div>
    </div>

    <br>
    <input type="submit" value="Salvar" class="btn btn-success" onclick="enviaDados()">
    <input type="reset" value="Cancelar" class="btn btn-default">
</form>
<div id="mensagem"><?php echo isset($sMensagem) ? $sMensagem : ''; ?></div>

<script src="assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="assets/js/ajaxentrega.js" type="text/javascript"></script>