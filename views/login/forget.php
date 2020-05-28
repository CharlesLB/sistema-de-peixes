<?php $v->layout('login/_theme'); ?>

<h1>Esqueci a senha</h1>

<form action="">
    <label for="id"><i class="fas fa-envelope"></i> <span>Matrícula</span> </label>
    <input type="number" name="id" id="id">

    <button>Enviar pedido de nova senha</button>
</form>

<ul>
    <li>Eba, eu <a href="<?= url("/login") ?>">lembrei a senha</a></li>
</ul>