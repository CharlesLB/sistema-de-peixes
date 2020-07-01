<div class="modal fade" id="delete-specie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSpecieLabel">Deletar espécie <?= $specie->name ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="delete-specie" action="<?= $router->route("specie.delete"); ?>" method="post">
                <div class="modal-body">
                    Se deseja realmente deletar para sempre a espécie <?= $specie->name ?> clique em <strong>deletar espécie</strong>.
                    <div class="form-group d-none">
                        <label for="specie-id-input">ID</label>
                        <input type="text" class="form-control specie-input" name="id" id="specie-id-input" placeholder="ID" value="<?= $specie->id ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Deletar espécie</button>
                </div>
            </form>
        </div>
    </div>
</div>