<?php $v->layout('admin/_theme'); ?>

<div class="left">
    <div>
        <h2>Notificações</h2>
        <div class="text">Aqui você pode gerenciar as notificações.</div>
    </div>
    <div class="list">
        <a href="<?= url("/admin") ?>" class="item <?php if ($subPage == "unreadedMails") : echo "active";endif; ?>">
            <i class="fas fa-envelope"></i>
            <span class="item-text">Não visualisadas</span>
        </a>
        <a href="<?= url("/admin") ?>" class="item <?php if ($subPage == "readedMails") : echo "active";endif; ?>">
            <i class="fas fa-envelope-open"></i>
            <span class="item-text">Visualizadas</span>
        </a>
    </div>
</div>

<div class="right">
    <?php $v->insert("admin/fragments/pages/mails/unreadedMails") ?>
</div>