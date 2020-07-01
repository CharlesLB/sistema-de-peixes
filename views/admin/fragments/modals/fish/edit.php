<div class="modal fade" id="edit-fish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFishLabel">Editar Peixe</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="edit-fish" action="<?= $router->route("fish.edit"); ?>">
                <div class="modal-body">
                    <div class="form-group d-none">
                        <label for="fish-id-edit-input">Id</label>
                        <input type="text" class="form-control" name="id" id="fish-id-edit-input">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="fish-sex-edit-select">Sexo</label>
                            <select class="custom-select" id="fish-sex-edit-select" name="sex" id="sex">
                                <option value="Indefinido" selected>Indefinido</option>
                                <option value="Macho">Macho</option>
                                <option value="Fêmea">Fêmea</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fish-weight-edit-input">Peso</label>
                            <input type="number" step="any" name="weight" class="form-control" id="fish-weight-edit-input" placeholder="Kilograma">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="fish-defaultLength-edit-input">Comprimento padrão</label>
                            <input type="number"  step="any" name="defaultLength" class="form-control" id="fish-defaultLength-edit-input" placeholder="Metros">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fish-totalLength-edit-input">Comprimento total</label>
                            <input type="number"  step="any" name="totalLength" class="form-control" id="fish-totalLength-edit-input" placeholder="Metros">
                        </div>
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