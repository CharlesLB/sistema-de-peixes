<?php

$v->layout('admin/_theme'); ?>

<?php if (!$reads) : ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mensagens não respondidas</h1>
    </div>

    <div class="row">

        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Mensagens</h6>
                </div>
                <div class="card-body">
                    <?php if (!$mails) :
                        $v->insert("admin/fragments/widgets/general/message", ["type" => "primary", "message" => "Você, junto com todos os outros membros do projeto, já visualaram todas as mensagens. Quando enviarem mais uma mensagem para o projeto, ela aparecerá aqui!"]);
                    else :
                        foreach ($mails as $mail) :
                            $v->insert("admin/fragments/widgets/mails/mail", ["mail" => $mail]);
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mensagens não respondidas</h1>
    </div>

    <div class="row">

        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Mensagens</h6>
                </div>
                <div class="card-body">
                    <?php if (!$mails) :
                        $v->insert("admin/fragments/widgets/general/message", ["type" => "primary", "message" => "Nenhuma mensagem foi respondida ainda. Quando for, ela aparecerá aqui."]);
                    else :
                        foreach ($mails as $mail) :
                            $v->insert("admin/fragments/widgets/mails/readedMail", ["mail" => $mail]);
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php $v->start("modals");
$v->insert("admin/fragments/modals/mails/read");
$v->insert("admin/fragments/modals/mails/unread");
$v->end(); ?>

<?php $v->start("scripts");
$v->insert("admin/fragments/scripts/mails");
$v->end(); ?>