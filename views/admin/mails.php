<?php

use function PHPSTORM_META\type;

$v->layout('admin/_theme'); ?>

<?php if (!$reads) : ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mensagens não respondidas</h1>
    </div>

    <div class="row">

        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php if (!$allMails) :
                        $v->insert("admin/fragments/widgets/general/message", ["message" => "Você, junto com todos os outros membros do projeto, já visualaram todas as mensagens. Quando enviarem mais uma mensagem para o projeto, ela aparecerá aqui!"]);
                    else :
                        foreach ($allMails as $mail) :
                            $v->insert("admin/fragments/widgets/mails/mail", ["mail" => $mail]);
                        endforeach;
                    ?>
                        <nav aria-label="Page navigation example container">
                            <ul class="pagination justify-content-center mt-4">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-arrow-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
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
                <div class="card-body">
                    <?php if (!$allMails) :
                        $v->insert("admin/fragments/widgets/general/message", ["type" => "primary" , "message" => "Nenhuma mensagem foi respondida ainda. Quando for, ela aparecerá aqui."]);
                    else :
                        foreach ($allMails as $mail) :
                            $v->insert("admin/fragments/widgets/mails/mail", ["mail" => $mail]);
                        endforeach;
                    ?>
                        <nav aria-label="Page navigation example container">
                            <ul class="pagination justify-content-center mt-4">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-arrow-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>