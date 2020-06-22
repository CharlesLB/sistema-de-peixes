<?php $v->layout('admin/_theme'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- cards -->
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Espécie</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            Espécies : <?= "9" ?><br>
                            Peixes : <?= "120 " ?> <br>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fish fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Peso e altura</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            Peso médio : <?= "4,56kg" ?> <br>
                            Altura média : <?= "0,56m" ?> <br>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-ruler fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Mensagens</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                            Não lidas : <?= "2" ?><br>
                            Total : <?= "17" ?> <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (1 == 1) : ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usuários</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                Bolsistas : <?= "9" ?><br>
                                Administradores : <?= "120 " ?> <br>
                                <br>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

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
                    $v->insert("admin/fragments/widgets/general/message", ["message" => "Você, junto com todos os outros membros do projeto, já visualaram todas as mensagens. Quando enviarem mais uma mensagem para o projeto, ela aparecerá aqui!"]);
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