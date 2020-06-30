<tr id="<?= $fish->id ?>">
    <td><?= $fish->id ?></td>
    <td><?= $fish->sex ?></td>
    <td><?= $fish->defaultLength?></td>
    <td><?= $fish->totalLength?></td>
    <td><?= $fish->weight?></td>
    <td><button type="button" data-role="update" data-id="<?= $fish->id ?>" class="btn btn-warning">Editar</button></td>
    <td><button type="button" data-role="delete" data-id="<?= $fish->id ?>" class="btn btn-danger">Deletar</button></td>
</tr>