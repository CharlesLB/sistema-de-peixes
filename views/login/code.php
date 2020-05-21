<?php $v->layout('login/_theme'); ?>

<h1>Confirmar Código</h1>

<form action="">
    <label for="id"><i class="fas fa-envelope"></i> <span>Matrícula</span> </label>
    <input type="number" name="id" id="id">

    <label for="code"><i class="fas fa-key"></i> <span>Código</span> </label>
    <input type="number" name="code" id="code">

    <button>Confirmar Código</button>
</form>

<ul>
    <li>Eba, eu <a href="<?= url("/login") ?>">lembrei a senha</a></li>
</ul>