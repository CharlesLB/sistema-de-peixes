<?php $v->layout('admin/_theme'); ?>

<div class="left">
    <div>
        <h2>Usuários</h2>
        <div class="text">Aqui, onde só o administrado tem acesso, pode ser administrado os usuários.</div>
    </div>
    <div class="list">
        <a href="<?= url("/admin/users") ?>" class="item active">
            <i class="fas fa-users"></i>
            <span class="item-text">Usuários</span>
        </a>
        <div class="item addSpecie">
			<i class="fas fa-plus"></i>
			<span class="item-text">Adicionar Usuário</span>
	    </div>
    </div>
    
</div>

<div class="right">
    <header>
        <h1>Usuários</h1>
    </header>

    <div class="cards center-cards">
        <div class="card">
            <div class="title">
                <i class="fas fa-users"></i>
                <h3> Relação de Usuários</h3>
            </div>
            <hr>
            <ul>
                <li><strong>Total de usuários:</strong> 8</li>
            </ul>
        </div>
    </div>


    <div class="body">
        <div class="actions">
            <form>
                <input type="text" placeholder="pesquisar">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <table>
            <tr>
                <th>ID <span><i class="fas fa-sort"></i></span></th>
                <th>Sexo <span><i class="fas fa-sort"></i></span></th>
                <th>Comprimento padrão <span><i class="fas fa-sort"></i></span></th>
                <th>Comprimento Total <span><i class="fas fa-sort"></i></span></th>
                <th>Peso <span><i class="fas fa-sort"></i></span></th>
                <th>Editar <span><i class="fas fa-sort"></i></span></th>
                <th>Deletar <span><i class="fas fa-sort"></i></span></th>
            </tr>
            <?php for ($i = 0; $i < 10; $i++) :
                $v->insert("admin/fragments/widgets/table-line");
            endfor; ?>
        </table>
        <nav class="paginator">
            <div>
                <a href="" id="left"><i class="fas fa-angle-double-left"></i></a>
                <a href="">1</a>
                <a href="" class="active">2</a>
                <a href="">3</a>
                <a href="" id="right"><i class="fas fa-angle-double-right"></i></a>
            </div>
        </nav>
    </div>
</div>

<?php $v->start("scripts"); ?>
<script>
    $(function() {
        $("form").submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var form_ajax = $(".form_ajax");

            $.ajax({
                url: form.attr("action"),
                data: form.serialize(),
                type: "post",
                dataType: "json",
                success: function(callback) {
                    if (callback.message) {
                        form_ajax.html(callback.message).fadeIn();
                    } else {
                        form_ajax.fadeOut(function() {
                            $(this).html("");
                        });
                    }

                    if (callback.success) {
                        $("#name").val("");
                        $("#email").val("");
                        $("#message").val("");
                    }
                }
            });
        });
    });
</script>

<?php $v->end(); ?>