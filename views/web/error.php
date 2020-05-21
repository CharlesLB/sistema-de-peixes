<?php $v->layout('web/_theme'); ?>

<?php $v->start("sidebar"); ?>

	<li><a href="<?= url() ?>">Retornar ao site</a></li>
	<li><a href="<?= url("/login")  ?>">Login</a></li>

<?php $v->end(); ?>

<?php $v->start("text"); ?>

	<h1>Ooops!</h1>
	<p>Parece que esta página não existe!</p>
	<ul class="actions">
		<li><a href="<?= url() ?>" class="button scrolly">Retornar ao site</a></li>
	</ul>

<?php $v->end(); ?>