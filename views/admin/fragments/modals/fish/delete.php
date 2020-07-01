<div class="modal fade" id="delete-fish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteFishLabel">Deletar Peixe</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="delete-fish" action="<?= $router->route("fish.delete"); ?>">
                <div class="modal-body">
                Se deseja realmente deletar para sempre este peixe clique em <strong>deletar peixe</strong>.
                    <div class="form-group d-none">
                        <label for="specie-name-input">ID</label>
                        <input type="text" class="form-control" name="id" id="fish-id-delete-input">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Deletar Peixe</button>
                </div>
            </form>
        </div>
    </div>
</div>