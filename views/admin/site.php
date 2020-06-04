<?php $v->layout('admin/_theme'); ?>

<div class="left">
    <div>
        <h2>Dashboard</h2>
        <div class="text">Analisando os dados gerais da aplicação e as notificações.</div>
    </div>
    <div class="list">
        <a href="<?= url("/admin") ?>" class="item <?php if ($subPage == "dash") : echo "active";endif; ?>">
            <i class="fas fa-toolbox"></i>
            <span class="item-text">Dash</span>
        </a>
    </div>
</div>

<div class="right">
    <div class="cards">
        <div class="card">
            <div class="title">
                <i class="fas fa-chart-pie"></i>
                <h3> Projeto</h3>
            </div>
            <hr>
            <ul>
                <li><strong>Espécies cadastradas:</strong> 8</li>
                <li><strong>Peixes cadastrados:</strong> 59</li>
                <li><strong>Peso médio:</strong> 5,47kg</li>
                <li><strong>Tamanho médio:</strong> 15cm</li>
            </ul>
        </div>

        <div class="card">
            <div class="title">
                <i class="fas fa-chart-pie"></i>
                <h3> Notificações</h3>
            </div>
            <hr>
            <ul>
                <li><strong>Novas notificações:</strong> 8</li>
                <li><strong>Contato geral:</strong> 59</li>
            </ul>
        </div>
    </div>
    <div class="notifications">
        <div class="header">
            <span class="icon"><i class="fas fa-envelope"></i></span>
            <h3>Notificações não lidas:</h3>
        </div>

        <?php if (1 == 1) :
            for ($i = 0; $i < 3; $i++) : ?>
                <div class="notificationCard">
                    <div class="notificationBody">
                        <span>José da Silva</span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas sed assumenda qui quaerat, maxime nisi minus eum veniam molestias! Rerum ex omnis, architecto voluptatibus deserunt id. Pariatur modi quae commodi. </p>
                    </div>
                    <div class="notificationFooter">
                        <button>Marcar como vista</button>
                        <button>Responder Via E-mail</button>
                    </div>
                </div>
            <?php endfor; ?>

            <nav class="paginator">
                <div>
                    <a href="" id="left"><i class="fas fa-angle-double-left"></i></a>
                    <a href="">1</a>
                    <a href="" class="active">2</a>
                    <a href="">3</a>
                    <a href="" id="right"><i class="fas fa-angle-double-right"></i></a>
                </div>
            </nav>
        <?php else :
            $v->insert('admin/fragments/noNotifications');
        endif; ?>
    </div>
</div>