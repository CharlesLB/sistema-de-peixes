<tr id="<?= $fish->id ?>">
    <td data-target="id"><?= $fish->id ?></td>
    <td data-target="sex"><?= $fish->sex ?></td>
    <td data-target="defaultLength" data-value="<?= $fish->defaultLength ?>"><?= floatFormat($fish->defaultLength) ?></td>
    <td data-target="totalLength" data-value="<?= $fish->totalLength ?>"><?= floatFormat($fish->totalLength)?></td>
    <td data-target="weight" data-value="<?= $fish->weight ?>"><?= floatFormat($fish->weight)?></td>
    <td><button type="button" data-id="<?= $fish->id ?>" class="btn btn-warning edit-fish-button">Editar</button></td>
    <td><button type="button" data-id="<?= $fish->id ?>" class="btn btn-danger delete-fish-button">Deletar</button></td>
</tr>