<?php $v->layout('login/_theme'); ?>

<h1>Nova senha</h1>

<form action="">
    <label for="password"><i class="fas fa-key"></i> <span>Nova senha</span> </label>
    <input type="password" name="password" id="password">

    <label for="newPassword"><i class="fas fa-key"></i> <span>Confirmar senha</span> </label>
    <input type="newPassword" name="newPassword" id="newPassword">

    <button>Alterar senha</button>
</form>

<ul>
    <li>Eba, eu <a href="<?= url("/login") ?>">lembrei a senha</a></li>
</ul>