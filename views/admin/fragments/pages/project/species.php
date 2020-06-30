<?php if($species):?>
<div class="row d-flex species">
    <?php 
    foreach ($species as $listed_specie) :
        $v->insert("admin/fragments/widgets/project/specie", ["specie" => $listed_specie]);
    endforeach;
    ?>
</div>
<?php else:
    $v->insert("admin/fragments/widgets/general/message", ["message" => "Nenhuma espécie foi cadastrada ainda, quando for cadastrada alguma, ela aparecerá aqui.", "type" => "primary"]);
endif; ?>
