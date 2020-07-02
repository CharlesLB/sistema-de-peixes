<div class="modal fade" id="unread-mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Marcar como não respondida</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="unread" action="<?= $router->route("mail.unread"); ?>">
                <div class="modal-body">
                    Deseja marcar esta mensagem como não respondida?
                    <div class="form-group d-none">
                        <label for="specie-name-input">ID</label>
                        <input type="text" class="form-control" name="id" id="id-makeAsUnread-mail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Marcar como não respondida</button>
                </div>
            </form>
        </div>
    </div>
</div>