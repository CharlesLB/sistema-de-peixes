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
            <div class="card-body">
                <?php if (1 == 0) :
                    $v->insert("admin/fragments/widgets/general/message", ["message" => "Você, junto com todos os outros membros do projeto, já visualaram todas as mensagens. Quando enviarem mais uma mensagem para o projeto, ela aparecerá aqui!", "type" => "primary"]);
                else :
                    for ($i = 0; $i < 5; $i++) {
                        $v->insert("admin/fragments/widgets/mails/mail", ["message" => "Você, junto com todos os outros membros do projeto, já visualaram todas as mensagens. Quando enviarem mais uma mensagem para o projeto, ela aparecerá aqui!", ""]);
                    }
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