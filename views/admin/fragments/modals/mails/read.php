<div class="modal fade" id="read-mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Marcar como Respondida</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="read" action="<?= $router->route("mail.read"); ?>">
                <div class="modal-body">
                    Deseja marcar esta mensagem como respondida?
                    <div class="form-group d-none">
                        <label for="specie-name-input">ID</label>
                        <input type="text" class="form-control" name="id" id="id-makeAsRead-mail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Marcar como respondida</button>
                </div>
            </form>
        </div>
    </div>
</div>