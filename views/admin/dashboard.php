<?php $v->layout('admin/_theme'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- cards -->
<div class="row">
    <?php
    $v->insert("admin/fragments/widgets/general/cards/bgCard", [
        "title" => "Espécie",
        "cardBody" => "Espécies : 0 <br> Peixes : 120<br>",
        "icon" => "fish"
    ]);

    $v->insert("admin/fragments/widgets/general/cards/bgCard", [
        "title" => "Mensagens",
        "cardBody" => "Não lidas : 2 <br> Total : 17 <br>",
        "icon" => "envelope"
    ]);

    ?>
</div>

<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Novas mensagens</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body d-flex flex-column">
                <?php if (1 == 0) :
                    $v->insert("admin/fragments/widgets/general/message", ["message" => "Você, junto com todos os outros membros do projeto, já visualaram todas as mensagens. Quando enviarem mais uma mensagem para o projeto, ela aparecerá aqui!", "type" => "primary"]);
                else :
                    foreach ($listMails as $mail) :
                        $v->insert("admin/fragments/widgets/mails/mail", ["mail" => $mail]);
                    endforeach;
                ?>
                    <div class="d-flex justify-content-center">
                        <a href="<?= url("admin/mensagens")?>" type="button" class="btn btn-secondary mr-3">Visualizar todas as novas mensagens</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>