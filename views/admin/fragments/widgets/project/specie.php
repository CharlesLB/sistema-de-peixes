<a href="<?= url("/admin/projeto/especie/{$specie->id}") ?>" class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="font-weight-bold text-primary text-uppercase mb-1"><span><?= $specie->name?></span></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-fish fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</a>