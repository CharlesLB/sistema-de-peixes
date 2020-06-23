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

    <button class="btn btn-primary mb-1" type="button">
        Adicionar espécie
    </button>
    </div>
</div>

<!-- species -->
<?= $v->insert("admin/fragments/pages/project/species", ["species" => $species]) ?>

<?php $v->start("scripts"); ?>
<script>
    $(function() {
        $(".search").submit(function(e) {
            e.preventDefault();

            var species = $(".species");
            var form = $(this);
            var input = $("#specieInput");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "get",
                dataType: "json",
                success: function(callback) {

                    if(callback.message){
                        species.html(callback.message).fadeIn();
                    }else{
                        species.html(callback.species).fadeIn();
                    }

                    input.val("");
                }
            });
        });
    });
</script>
<?php $v->end(); ?>