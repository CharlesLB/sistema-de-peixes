<header>
    <div class="title">
        <span class="icon"><i class="fas fa-envelope"></i></span>
        <h1>Notificações lidas:</h1>
    </div>
</header>
<div class="notificationsBlock notifications">
    <?php if (1 == 1) :
        for ($i = 0; $i < 3; $i++) :
            $v->insert('admin/fragments/widgets/mails/readedMail');
        endfor; ?>

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
        $v->insert('admin/fragments/widgets/text', ["text" => "Opa, parece que todos os e-mail já foram verificados. Quando uma nova mensagem for enviada, ela aparecerá aqui."]);
    endif; ?>
</div>