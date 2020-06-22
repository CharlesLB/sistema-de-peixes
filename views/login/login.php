<?php $v->layout('login/_theme'); ?>

<h1>Login</h1>

<div class="form_ajax" style="display: none"></div>

<form action="<?= url("/login") ?>" method="post">
    <label for="id"><i class="fas fa-envelope"></i> <span>Matrícula</span> </label>
    <input type="number" name="id" id="id">

    <label for="password"><i class="fas fa-key"></i> <span>Senha</span> </label>
    <input type="password" name="password" id="password">

    <button>Login</button>
</form>

<ul>
    <li>Ops, eu <a href="<?= url("/esqueci-senha") ?>">esqueci a senha</a></li>
</ul>

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

                    if(callback.message){
                        form_ajax.html(callback.message).fadeIn();
                    }else{
                        form_ajax.fadeOut(function(){
                            $(this).html("");
                        });
                    }
                    $("#password").val("");
                }
            });
        });
    });
</script>
<?php $v->end(); ?>