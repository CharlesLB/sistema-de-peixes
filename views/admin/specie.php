<?php $v->layout('admin/_theme'); ?>

<?php $v->start("styles"); ?>
<link href="<?= asset("css/datatables.min.css", "admin") ?>" rel="stylesheet">
<?php $v->end(); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><span id="specieName"><?= $specie->name ?></span></h1>
    <div>
        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#edit-specie">
            Editar Espécie
        </button>
        <button class="btn btn-danger mb-1" type="button" data-toggle="modal" data-target="#delete-specie">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</div>

<!-- cards -->
<div class="row">
    <?php $v->insert("admin/fragments/widgets/general/cards/bgCard", [
        "title" => "Dados",
        "cardBody" => "Total de Peixes: <span id='totalFish'>{$total}</span> <br><br><br>",
        "icon" => "fish"
    ]) ?>

    <?php $v->insert("admin/fragments/widgets/general/cards/bgCard", [
        "title" => "Peso e altura",
        "cardBody" => "
            Peso médio : <span id='mediaWeight'>{$specie->mediaWeight}</span>  <br> 
            Comprimento total média: <span id='mediaTotalLength'>{$specie->mediaTotalLength}</span> <br> 
            Comprimento padrão média: <span id='mediaDefaultLength'>{$specie->mediaDefaultLength}</span> <br>",
        "icon" => "ruler"
    ]) ?>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-bold text-primary">Peixes</h6>
        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#create-fish">
            Adicionar peixe
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sexo</th>
                        <th>Comprimento Padrão</th>
                        <th>Comprimento Total</th>
                        <th>Peso</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody id="fishes">
                    <?php if ($fishes) {
                        foreach ($fishes as $selectedFish) {
                            $v->insert("admin/fragments/widgets/specie/tableLine", ["fish" => $selectedFish]);
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modals -->
<?php $v->insert("admin/fragments/modals/specie/edit", ["specie" => $specie]); ?>
<?php $v->insert("admin/fragments/modals/specie/delete", ["specie" => $specie]); ?>

<?php $v->insert("admin/fragments/modals/fish/create", ["specie_id" => $specie->id]); ?>
<?php $v->insert("admin/fragments/modals/fish/edit"); ?>
<?php $v->insert("admin/fragments/modals/fish/delete"); ?>



<div id="header">
</div>

<?php $v->start("scripts"); ?>

<?php $v->insert("admin/fragments/scripts/specie") ?>

<!-- DataTables -->
<script src="<?= asset("scripts/datatables.min.js", "admin") ?>"></script>
<script src="<?= asset("scripts/datatables.bootstrap.min.js", "admin") ?>"></script>

<?php $v->end(); ?>