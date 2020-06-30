<tr id="<?= $fish->id ?>">
    <td><?= $fish->id ?></td>
    <td><?= $fish->sex ?></td>
    <td><?= floatFormat($fish->defaultLength) ?></td>
    <td><?= floatFormat($fish->totalLength)?></td>
    <td><?= floatFormat($fish->weight)?></td>
    <td><button type="button" data-role="update" data-id="<?= $fish->id ?>" class="btn btn-warning">Editar</button></td>
    <td><button type="button" data-role="delete" data-id="<?= $fish->id ?>" class="btn btn-danger">Deletar</button></td>
</tr>