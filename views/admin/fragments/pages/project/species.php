<div class="row species d-flex">
    <?php 
    foreach ($species as $listed_specie) :
        $v->insert("admin/fragments/widgets/project/specie", ["specie" => $listed_specie]);
    endforeach;
    ?>
</div>