<header>
    <h1>Nome da espécie</h1>
    <button class="delete">Excluir Espécie</button>
</header>

<div class="cards center-cards">
    <div class="card">
        <div class="title">
            <i class="fas fa-balance-scale-right"></i>
            <h3> Relação de peso</h3>
        </div>
        <hr>
        <ul>
            <li><strong>Espécies cadastradas:</strong> 8</li>
            <li><strong>Peixes cadastrados:</strong> 59</li>
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


<div class="body">
		<div class="actions">
			<button>Inserir Peixe</button>
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
				$v->insert("admin/fragments/wingets/table-line");
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