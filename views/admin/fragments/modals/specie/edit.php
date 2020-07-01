<div class="modal fade" id="edit-specie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSpecieLabel">Editar espécie <?= $specie->name ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="edit-specie" action="<?= $router->route("specie.edit"); ?>">
                <div class="modal-body">
                    <div class="form-group d-none">
                        <label for="specie-id-input-edit">ID</label>
                        <input type="text" class="form-control specie-input" name="id" id="specie-id-input-edit" placeholder="ID" value="<?= $specie->id ?>">
                    </div>
                    <div class="form-group">
                        <label for="specie-name-input-edit">Nome da espécie</label>
                        <input type="text" class="form-control specie-input" name="name" id="specie-name-input-edit" placeholder="Nome da espécie" value="<?= $specie->name ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Editar espécie</button>
                </div>
            </form>
        </div>
    </div>
</div>