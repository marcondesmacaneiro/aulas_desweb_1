<?php

header('Content-type: text/html; charset=utf-8');

$oPedido = new Pedido();
$oCliente = new Cliente();
$oEntrega = new Entrega();
$aPedido = $oPedido->listar();

echo "
    <form name='form2' id='form2' method='POST' action='pesquisa.php'>
        <label for='pesquisa'>Buscar por nome:</label>
        <div class='row'>
            <div class='col-md-3'>
                <input type='text' id='pesquisa' name='pesquisa' class='form-control' 
                       placeholder='Insira um nome'/>
            </div>  
            <div class='col-md-2'>
                <input type='submit' class='btn btn-default' value='Buscar'>
            </div>
        </div> 
    </form>
        <h2>Pedidos</h2>
                <form name='form1' id='form1' >
                    <table class='table table-striped' id='tabela'>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Código</th>
                                <th>Pedido</th>
                                <th>Data de Solicitação</th>
                                <th>Data de Entrega</th>
                                <th>Cliente</th>
                                <th>Tipo da Entrega</th>
                                <th>Situação</th>
                            </tr>
                        </thead>
                        <tbody>";

                    foreach($aPedido as $aPed){
    echo " 
                        <tr>
                            <td><input type='checkbox' value='" . $aPed->getCodigo() . "'
                                name='checkbox[]' id='checkbox[]'></td> 
                            <td>" . $aPed->getCodigo()    . "</td> 
                            <td>" . $aPed->getDescricao() . "</td> 
                            <td>" . $aPed->getDatasolicitacao() . "</td> 
                            <td>" . $aPed->getDataentrega() . "</td> 
                            <td>" . $aPed->getCliente()->getCodigo() . "</td> 
                            <td>" . $aPed->getEntrega()->getCodigo() . "</td> 
                            <td>" . $aPed->getSituacao() . "</td> 
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
            <div class="col-md-12">
                <label for="descricao">Descrição do pedido:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" 
                       placeholder="Informe a descrição do pedido" >
            </div>
        </div>    
        <br>
        <div class="row">
            <div class="col-md-6">
                <label>Data da solicitação:</label>
                <input type="date" id="solidata" name="solidata" class="form-control" />
            </div>
            <div class="col-md-6">
                <label>Data da entrega:</label>
                <input type="date" id="entredata" name="entredata" class="form-control" />
            </div>
        </div>    
        <br>
        <div class="row">
                <div class="col-md-6">
                    <label for="clientes">Clientes:</label>
                    <select class="form-control" id="clientes" name="clientes">
                        <option value="">Selecione um cliente</option>
                        <?php 
                            $aCliente = $oCliente->listar();
                            foreach($aCliente as $oCli){
                        ?>
                        <option value="<?php echo $oCli->getCodigo(); ?>">
                            <?php echo $oCli->getNome(); ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="entrega">Entrega:</label>
                    <select class="form-control" id="entregas" name="entregas">
                        <option value="">Selecione o tipo de entrega</option>
                        <?php 
                            $aEntrega = $oEntrega->listar();
                            foreach($aEntrega as $oEnt){
                        ?>
                        <option value="<?php echo $oEnt->getCodigo(); ?>">
                            <?php echo $oEnt->getTipo(); ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                 <label>Entregue?</label>
                <input type="checkbox" id="situacao" name="situacao" style="width: 15px; height: 15px;" />
            </div>
        </div>
        <br>
        <input type="submit" value="Salvar" class="btn btn-success" onclick="enviaDados()">
        <input type="reset" value="Cancelar" class="btn btn-default">
    </form>
    <div id="mensagem"><?php echo isset($sMensagem) ? $sMensagem : '';?></div>
    <br>

    <script src="assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="assets/js/ajaxpedido.js" type="text/javascript"></script>