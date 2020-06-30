<?php $v->layout('admin/_theme'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Espécies</h1>
    <div>
        <form class="d-none d-sm-inline-block form-inline navbar-search mr-2 search" action="<?= $router->route("specie.search"); ?>">
            <div class="input-group">
                <input type="text" name="search" class="form-control border-0 small" id="specieInput" placeholder="Pesquisar espécie" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#create-specie">
            Adicionar espécie
        </button>
    </div>
</div>

<!-- species -->
<?= $v->insert("admin/fragments/pages/project/species", ["species" => $species]) ?>

<!-- Modals -->
<?php $v->insert("admin/fragments/modals/specie/create") ?>

<?php $v->start("scripts"); ?>
    <?php $v->insert("admin/fragments/scripts/project") ?>
<?php $v->end(); ?>