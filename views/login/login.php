<?php $v->layout('login/_theme'); ?>

<h1>Login</h1>

<form action="<?= url()?>">
    <label for="id"><i class="fas fa-envelope"></i> <span>Matrícula</span> </label>
    <input type="number" name="id" id="id">

    <label for="password"><i class="fas fa-key"></i> <span>Senha</span> </label>
    <input type="password" name="password" id="password">

    <button>Login</button>
</form>

<ul>
    <li>Ops, eu <a href="<?= url("/esqueci-senha") ?>">esqueci a senha</a></li>
</ul>