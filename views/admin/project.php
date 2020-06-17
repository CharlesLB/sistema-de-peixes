<?php $v->layout('admin/_theme'); ?>

<div class="left">
	<div>
		<h2>Espécies</h2>
		<div class="text">Selecione uma espécie da lista para gerenciá-la.</div>
	</div>
	<div class="">
		<div class="list specieList">
			<?php
			foreach ($species as $listed_specie) :
				$v->insert("admin/fragments/widgets/project/specieCard", ["specie" => $listed_specie]);
			endforeach;
			?>
		</div>

		<form id="addEspecie" action="<?= $router->route("specie.create"); ?>" method="post" enctype="multipart/form-data">
			<input class="addEspecieInput" type="text" name="name" placeholder="Adicionar espécie">
			<button> <i class="fas fa-plus"></i></button>
		</form>
		<div class="specieMessage"></div>
	</div>
</div>

<div class="right">
	<?php
	if (!$specie) :
		$v->insert("admin/fragments/widgets/text", ["text" => "Para ver mais informações sobre as espécies, selecione alguma na barra de navegação lateral."]);
	else : ?>
		<header>
			<h1><?= $specie->name ?></h1>
			<button class="delete" data-especieId="<?= $specie->id; ?>">Excluir Espécie</button>
		</header>

		<?php if ($numberFishes > 0) : ?>

			<div class="cards center-cards">
				<div class="card">
					<div class="title">
						<i class="fas fa-balance-scale-right"></i>
						<h3>Relação de peso</h3>
					</div>
					<hr>
					<ul>
						<li><strong>Peixes dessa espécie:</strong> 59</li>
						<li><strong>Peso médio:</strong> 5,47kg</li>
						<li><strong>Tamanho médio:</strong> 15cm</li>
					</ul>
				</div>

				<div class="card">
					<div class="title">
						<i class="fas fa-ruler-combined"></i>
						<h3> Relação de tamanho</h3>
					</div>
					<hr>
					<ul>
						<li><strong>Novas notificações:</strong> 8</li>
						<li><strong>Contato geral:</strong> 59</li>
					</ul>
				</div>
			</div>

		<?php endif; ?>

		<div class="body">
			<div class="actions">
				<button>Inserir Peixe</button>
				<?php if ($numberFishes > 0) : ?>
					<form>
						<input type="text" placeholder="pesquisar">
						<button><i class="fas fa-search"></i></button>
					</form>
				<?php endif; ?>
			</div>
			<?php if ($numberFishes == 0) :
				$v->insert("admin/fragments/widgets/text", ["text" => "Nenhum peixe foi adicionado a essa espécie."]);
			else : ?>
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
			<?php foreach ($fishes as $fish) :
					$v->insert("admin/fragments/widgets/project/table-inline", ["fish", $fish]);
				endforeach;
			endif; 	?>

		</div>
	<?php endif; ?>
</div>

<?php $v->start("scripts"); ?>
<script>
	$(function() {
		$("#addEspecie").submit(function(e) {
			e.preventDefault();
			var form = $(this);
			var list = $(".specieList");
			var message = $(".specieMessage");

			$.ajax({
				url: form.attr("action"),
				data: form.serialize(),
				type: "POST",
				dataType: "json",
				success: function(callback) {
					$(".addEspecieInput").val("");

					if (callback.message) {
						message.append(callback.message);
					}

					if (callback.specie) {
						list.append(callback.specie);
					}
				}
			});
		});
	});
</script>

<?php $v->end(); ?>