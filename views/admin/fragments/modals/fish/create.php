<div class="modal fade" id="create-fish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFishLabel">Adicionar peixe</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="create-fish" action="<?= $router->route("fish.create"); ?>">
                <div class="modal-body">
                    <div class="form-group d-none">
                        <label for="specie-name-input">Id da espécie</label>
                        <input type="text" class="form-control" name="specie_id" id="specie-name-input" placeholder="Nome da espécie" value="<?= $specie_id ?>">
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="sex">Sexo</label>
                            <select class="custom-select create-fish-select" name="sex" id="sex">
                                <option value="Indefinido" selected>Indefinido</option>
                                <option value="Macho">Macho</option>
                                <option value="Fêmea">Fêmea</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="weight">Peso</label>
                            <input type="number"  step="any" name="weight" class="form-control create-fish-input" id="weight" placeholder="Kilograma">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="defaultLength">Comprimento padrão</label>
                            <input type="number"  step="any" name="defaultLength" class="form-control create-fish-input" id="defaultLength" placeholder="Metros">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="totalLength">Comprimento total</label>
                            <input type="number"  step="any" name="totalLength" class="form-control create-fish-input" id="totalLength" placeholder="Metros">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Adicionar peixe</button>
                </div>
            </form>
        </div>
    </div>
</div>