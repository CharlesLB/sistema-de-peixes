<?php $v->layout('web/_theme'); ?>

<?php $v->start("sidebar"); ?>

	<li><a href="#intro">Bem Vindo!</a></li>
	<li><a href="#one">Nosso Projeto</a></li>
	<li><a href="#two">O que fazemos</a></li>
	<li><a href="#three">Contato</a></li>
	<li><a href="<?= url("/login")  ?>">Login</a></li>

<?php $v->end(); ?>

<?php $v->start("text"); ?>

	<h1>Projeto de Biologia</h1>
	<p>Um projeto pertencente ao <a href="https://www.ifsudestemg.edu.br/juizdefora">IF Sudeste MG Campus Juiz de Fora</a><br />
		com o objetivo de esturdarmos peixes bacanas</a>.</p>
	<ul class="actions">
		<li><a href="#one" class="button scrolly">Conhecer nosso projeto</a></li>
	</ul>

<?php $v->end(); ?>



<!--
// ─── SECTIONS ────────────────────────────────────────────────────────────────────
-->

	
<!-- Wrapper -->
<div id="wrapper">

	<!-- One -->
	<section id="one" class="wrapper style2 spotlights">
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

	<!-- Two -->
	<section id="two" class="wrapper style3 fade-up">
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

	<!-- Three -->
	<section id="three" class="wrapper style1 fade-up">
		<div class="inner">
			<h2>Área Restrita</h2>
			<p>Caso seja um bolsista ou voluntário, basta fazer seu login para prosseguir. Caso ainda não possui um login, entre em contato com o orientador do projeto.</p>
			<div class="split style1">
				<section>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<label for="name">Nome</label>
								<input type="text" name="name" id="name" />
							</div>
							<div class="field half">
								<label for="email">E-mail</label>
								<input type="text" name="email" id="email" />
							</div>
							<div class="field">
								<label for="message">Messagem</label>
								<textarea name="message" id="message" rows="5"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><a href="" class="button submit">Send Message</a></li>
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