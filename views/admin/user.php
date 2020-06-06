<?php $v->layout('admin/_theme'); ?>

<div class="left">
	<div>
		<h2>Meu usuário</h2>
		<div class="text">Aqui você pode editar seus dados.</div>
	</div>
	<div class="list">
        <a href="<?= url("/admin/user") ?>" class="item active">
            <i class="fas fa-user"></i>
            <span class="item-text">Meu usuário</span>
        </a>
	</div>
</div>

<div class="right">
	<?php $v->insert("admin/fragments/pages/users/userPage"); ?>
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