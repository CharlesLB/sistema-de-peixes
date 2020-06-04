<?php $v->layout('web/_theme'); ?>

<?php $v->start("sidebar"); ?>

<li><a href="#intro">Bem Vindo!</a></li>
<li><a href="#projeto">Nosso Projeto</a></li>
<li><a href="#o-que-fazemos">O que fazemos</a></li>
<li><a href="#contato">Contato</a></li>
<li><a href="<?= url("/login")  ?>">Login</a></li>

<?php $v->end(); ?>

<?php $v->start("text"); ?>

<h1>Projeto de Biologia</h1>
<p>Um projeto pertencente ao <a href="https://www.ifsudestemg.edu.br/juizdefora">IF Sudeste MG Campus Juiz de Fora</a><br />
	com o objetivo de esturdarmos peixes bacanas</a>.</p>
<ul class="actions">
	<li><a href="#projeto" class="button scrolly">Conhecer nosso projeto</a></li>
</ul>

<?php $v->end(); ?>



<!--
// ─── SECTIONS ────────────────────────────────────────────────────────────────────
-->


<!-- Wrapper -->
<div id="wrapper">

	<!-- projeto -->
	<section id="projeto" class="wrapper style2 spotlights">
		<section>
			<a href="#" class="image"><img src="<?= asset("/images/pic02.jpg", "web"); ?>" alt="" data-position="center center" /></a>
			<div class="content">
				<div class="inner">
					<h2>Nosso projeto é legal</h2>
					<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
				</div>
			</div>
		</section>
		<section>
			<a href="#" class="image"><img src="<?= asset("/images/pic01.jpg", "web"); ?>" alt="" data-position="top center" /></a>
			<div class="content">
				<div class="inner">
					<h2>Feugiat consequat</h2>
					<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
				</div>
			</div>
		</section>
		<section>
			<a href="#" class="image"><img src="<?= asset("/images/pic03.jpg", "web"); ?>" alt="" data-position="25% 25%" /></a>
			<div class="content">
				<div class="inner">
					<h2>Ultricies aliquam</h2>
					<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
				</div>
			</div>
		</section>
	</section>

	<!-- o-que-fazemos -->
	<section id="o-que-fazemos" class="wrapper style3 fade-up">
		<div class="inner">
			<h2>O que nós fazemos</h2>
			<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
			<div class="features">
				<section>
					<span class="icon solid major fa-code"></span>
					<h3>Lorem ipsum amet</h3>
					<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
				</section>
				<section>
					<span class="icon solid major fa-lock"></span>
					<h3>Aliquam sed nullam</h3>
					<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
				</section>
				<section>
					<span class="icon solid major fa-cog"></span>
					<h3>Sed erat ullam corper</h3>
					<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
				</section>
				<section>
					<span class="icon solid major fa-desktop"></span>
					<h3>Veroeros quis lorem</h3>
					<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
				</section>
				<section>
					<span class="icon solid major fa-link"></span>
					<h3>Urna quis bibendum</h3>
					<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
				</section>
				<section>
					<span class="icon major fa-gem"></span>
					<h3>Aliquam urna dapibus</h3>
					<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
				</section>
			</div>
		</div>
	</section>

	<!-- contato -->
	<section id="contato" class="wrapper style1 fade-up">
		<div class="inner">
			<h2>Contato</h2>
			<p>Entre em contato conosco.</p>

			<div class="split style1">
				
				<section>
					<div class="form_ajax" style="display: none"></div>
					<form method="post" action="<?= $router->route("mail.contact") ?>">
						<div class="fields">
							<div class="field half">
								<label for="name">Nome</label>
								<input type="text" name="name" id="name"/>
							</div>
							<div class="field half">
								<label for="email">E-mail</label>
								<input type="text" name="email" id="email"/>
							</div>
							<div class="field">
								<label for="message">Messagem</label>
								<textarea name="message" id="message" rows="5"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><a href="" class="button submit">Enviar Mensagem</a></li>
						</ul>
					</form>
				</section>
				<section>
					<ul class="contact">
						<li>
							<h3>Endereço</h3>
							<span> IF Sudeste MG Campus Juiz de Fora<br />
								R. Bernardo Mascarenhas, 1283 - Fábrica, Juiz de Fora - MG, 36080-001<br />
								Bloco C</span>
						</li>
						<li>
							<h3>E-mail</h3>
							<a href="#">laboratoriobiologiaif@gmail.com</a>
						</li>
					</ul>
				</section>
			</div>
		</div>
	</section>
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