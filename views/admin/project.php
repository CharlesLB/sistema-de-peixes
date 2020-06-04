<?php $v->layout('admin/_theme'); ?>

<div class="left">
    <div>
        <h2>Dashboard</h2>
        <div class="text">Analisando os dados gerais da aplicação e as notificações.</div>
    </div>
    <div class="list">
        <?php 
        for ($i=0; $i < 5; $i++):
            $v->insert("admin/fragments/specieCard");
        endfor;
        ?>
        <div class="item addSpecie">
            <i class="fas fa-plus"></i>
            <span class="item-text">Adicionar Espécie</span>
        </div>
    </div>
</div>

<div class="right">
    <?php $v->insert("admin/fragments/text", ["text" => "Para ver mais informções sobre as espécies, selecione alguma na barra de navegação lateral."]) ?>
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

					if(callback.success){
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