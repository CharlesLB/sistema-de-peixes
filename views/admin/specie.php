<?php $v->layout('admin/_theme'); ?>

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

    <?php $v->insert("admin/fragments/widgets/general/cards/bgCard" ,[
        "title" => "Dados",
        "cardBody" => "Total de Peixes: {$dataSpecie["total"]} <br><br><br>",
        "icon" => "fish"  
    ])?>

    <?php $v->insert("admin/fragments/widgets/general/cards/bgCard" ,[
        "title" => "Peso e altura",
        "cardBody" => "Peso médio :  {$dataSpecie["totalWeight"]} <br> Comprimento total média: {$dataSpecie["totalTotalLength"]} <br> Comprimento padrão média: {$dataSpecie["totalDefaultLength"]} <br>",
        "icon" => "ruler"  
    ])?>

</div>


<!-- Modals -->
<?php $v->insert("admin/fragments/modals/specie/edit" , ["specie" => $specie]) ?>
<?php $v->insert("admin/fragments/modals/specie/delete" , ["specie" => $specie]) ?>

<div id="header">
</div>

<?php $v->start("scripts"); ?>
    <?php $v->insert("admin/fragments/scripts/specie") ?>
<?php $v->end(); ?>