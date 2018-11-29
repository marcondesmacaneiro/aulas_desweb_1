<div class="container">
    <h5>Usuários</h5>
    <button type="button" class="btn btn-success btnAddUsuarios">Adicionar Usuário</button>
    <table id="usuarios" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
    </table>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form class="formAdd" page="usuariosadd.php" method="POST">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar Novo Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="nome">Nome*</label>
                    <input type="text" class="form-control nome" name="nome" required>
                </div>
                <div class="col-md-4">
                    <label for="email">E-mail*</label>
                    <input type="email" class="form-control email" name="email" required>
                </div>
                <div class="col-md-4">
                    <label for="senha">Senha*</label>
                    <input type="password" class="form-control senha" name="senha" required>
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