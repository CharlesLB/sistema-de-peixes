<div class="modal fade" id="create-specie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSpecieLabel">Adicionar espécie</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="create-specie" action="<?= $router->route("specie.create"); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="specie-name-input">Nome da espécie</label>
                        <input type="text" class="form-control" name="name" id="specie-name-input" placeholder="Nome da espécie">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Adicionar espécie</button>
                </div>
            </form>
        </div>
    </div>
</div>