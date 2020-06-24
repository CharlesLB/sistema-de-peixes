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

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"></div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-ruler fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modals -->
<?php $v->insert("admin/fragments/modals/specie/edit" , ["specie" => $specie]) ?>
<?php $v->insert("admin/fragments/modals/specie/delete" , ["specie" => $specie]) ?>

<div id="header">
</div>

<?php $v->start("scripts"); ?>
    <?php $v->insert("admin/fragments/scripts/specie") ?>
<?php $v->end(); ?>