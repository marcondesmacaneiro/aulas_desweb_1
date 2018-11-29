<div class="container">
    <h5>Viagens</h5>
    <button type="button" class="btn btn-success btnAddViagens">Adicionar Viagem</button>
    <table id="viagens" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Saída</th>
            <th>Destino</th>
        </tr>
    </thead>
</table>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form class="formAdd" page="viagensadd.php" method="POST">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="saida">Saida*</label>
                    <input type="text" class="form-control saida" name="saida" required>
                </div>
                <div class="col-md-6">
                    <label for="destino">Destino*</label>
                    <input type="text" class="form-control destino" name="destino" required>
                </div>
                <div class="col-md-6">
                    <label for="veiculo">Veículo*</label>
                    <input type="text" class="form-control veiculo" required>
                    <input type="text" class="form-control veiculoid" name="veiculo" hidden>
                </div>
                <div class="col-md-6">
                    <label for="motorista">Motorista*</label>
                    <input type="text" class="form-control motorista" required>
                    <input type="text" class="form-control motoristaid" name="motorista" hidden>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
        </form>
    </div>
  </div>
</div>