<?php

header('Content-type: text/html; charset=utf-8');

$oCliente = new Cliente();
$oEndereco = new Endereco();
$aCli = $oCliente->listar();

echo "
    <h2>Clientes</h2>
            <form name='form1' id='form1' >
                <table class='table table-striped' id='tabela'>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                        </tr>
                    </thead>
                    <tbody>";

                foreach ($aCli as $oCli) {
    echo " 
                    <tr>
                        <td><input type='checkbox' value='" . $oCli->getCodigo() . "'
                            name='checkbox[]' id='checkbox[]'></td> 
                        <td>" . $oCli->getCodigo()    . "</td> 
                        <td>" . $oCli->getNome() . "</td> 
                        <td>" . $oCli->getEndereco()->getDescricao() . "</td> 
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
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" 
                       placeholder="Informe o nome" >
                <br>
                <label>Endereço:</label>
                <select class="form-control" id="select_enderecos" name="select_enderecos">
                    <option value="">Escolha um endereço</option>
                    <?php 
                        $aEnderecos = $oEndereco->listar();
                        foreach($aEnderecos as $oEnd){
                    ?>
                    <option value="<?php echo $oEnd->getCodigo(); ?>">
                        <?php echo $oEnd->getDescricao(); ?></option>
                    <?php
                        }
                    ?>
                </select>    
            </div>
        </div>
        <br>
        <input type="submit" value="Salvar" class="btn btn-success" onclick="enviaDados()">
        <input type="reset" value="Cancelar" class="btn btn-default">
    </form>
    <br>
    <div id="mensagem"><?php echo isset($sMensagem) ? $sMensagem : '';?></div>


<script src="assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="assets/js/ajaxcliente.js" type="text/javascript"></script>

