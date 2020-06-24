<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $specie->name ?></h1>
    <div>
        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#edit-specie">
            Editar Espécie
        </button>
        <button class="btn btn-danger mb-1" type="button" data-toggle="modal" data-target="#delete-specie">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</div>

<!-- Modals -->
<?php $v->insert("admin/fragments/modals/specie/edit" , ["specie" => $specie]) ?>
<?php $v->insert("admin/fragments/modals/specie/delete" , ["specie" => $specie]) ?>