<div class="container">
    <h5>Veículos</h5>
    <button type="button" class="btn btn-success btnAddVeiculos">Adicionar Veículo</button>
    <table id="veiculos" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Placa</th>
            <th>Lotação</th>
        </tr>
    </thead>
</table>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form class="formAdd" page="veiculosadd.php" method="POST">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="placa">Placa*</label>
                    <input type="text" class="form-control placa" name="placa" required>
                </div>
                <div class="col-md-6">
                    <label for="lotacao">Lotação*</label>
                    <input type="number" class="form-control lotacao" name="lotacao" required>
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