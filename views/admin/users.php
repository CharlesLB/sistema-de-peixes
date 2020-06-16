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
    <?php $v->insert("admin/fragments/pages/users/usersList"); ?>
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