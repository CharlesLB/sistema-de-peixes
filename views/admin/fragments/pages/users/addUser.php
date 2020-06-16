<header>
    <div class="title">
        <span class="icon"><i class="fas fa-user"></i></span>
        <h2>Adicionar usuário:</h2>
    </div>
</header>

<div class="userForm">
    <form action="">
        <h3>Dados: </h3>
        <div class="formGroup">
            <div class="formItem">
                <label for="first_name">Primeiro nome:</label>
                <input type="text" id="first_name" name="first_name" value="Nome">
            </div>
            <div class="formItem">
                <label for="last_name">Sobrenome:</label>
                <input type="text" id="last_name" name="last_name" value="Sobrenome">
            </div>
        </div>
        <div class="formGroup">
            <div class="formItem">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="example@example.com">
            </div>
            <div class="formItem">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" placeholder="********">
            </div>
        </div>
        <?php if (1 != 1) : ?>
            <div class="formGroup">
                <div class="formItem">
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="Ativo">Ativo</option>
                        <option value="Ativo">Suspenso</option>
                    </select>
                </div>
                <div class="formItem">
                    <label for="level">Level:</label>
                    <select name="level" id="level">
                        <option value="2">Bolsista</option>
                        <option value="1">Administrador</option>
                    </select>
                </div>
            </div>
        <?php endif; ?>
        <button>Atualizar Dados</button>
    </form>
</div>