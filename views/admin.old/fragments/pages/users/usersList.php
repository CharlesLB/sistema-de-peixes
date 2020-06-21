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
            <li><strong>Total de administradores:</strong> 2</li>
            <li><strong>Total de bolsistas:</strong> 6</li>
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
    <table class="content-table">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Primeiro nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Level</th>
                <th>Status</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 10; $i++) :
                $v->insert("admin/fragments/widgets/users/table-inline");
            endfor; ?>
        </tbody>
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