<a href="<?= url("/admin/projeto/{$specie->id}") ?>" class="item <?php if ($subPage == $specie->id) : echo "active";endif; ?>">
    <span class="item-text"><?= $specie->name?></span>
</a>