<?php

header('Content-type: text/html charset=utf-8');

$oEndereco = new Endereco();
$aEndereco = $oEndereco->listar();

echo "
    <h2>Endereços</h2>
            <form name='form1' id='form1' >
                <table class='table table-striped' id='tabela'>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Endereço</th>
                        </tr>
                    </thead>
                    <tbody>";

                foreach($aEndereco as $oEnd){
    echo " 
                    <tr>
                        <td><input type='checkbox' value='" . $oEnd->getCodigo() . "'
                            name='checkbox[]' id='checkbox[]'></td> 
                        <td>" . $oEnd->getCodigo()    . "</td> 
                        <td>" . $oEnd->getTipo() . "</td> 
                        <td>" . $oEnd->getDescricao() . "</td> 
                    </tr>";
}

echo "
                    </tbody>
                </table>";

?>

    <input type="submit" value="Excluir" class="btn btn-danger" onclick="deletar()">
    <input type="submit" value="Selecionar" class="btn btn-primary" onclick="selecionar()">
            </form>

    <form class="form-signin" method="" action="" id="form-salvar">
        <input type="hidden" id="codigo" name="codigo">

        <div class="row">
            <div class="col-md-6">
                <label for="tipo">Tipo:</label>
                <input type="text" class="form-control" id="endtipo" name="endtipo" 
                       placeholder="Informe o tipo do endereço"> 
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" 
                       placeholder="Informe um endereço"> 
                <br>
            </div>        
        </div>
        <input type="submit" value="Salvar" class="btn btn-success" onclick="enviaDados()">
        <input type="reset" value="Cancelar" class="btn btn-default">

        <div id="mensagem"><?php echo isset($sMensagem) ? $sMensagem : '';?></div>
    </form>        


        <script src="assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="assets/js/ajaxendereco.js" type="text/javascript"></script>