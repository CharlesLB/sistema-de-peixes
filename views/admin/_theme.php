<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset("/css/styles.css", "admin") ?>">
    <link rel="icon" href="<?= shared("/images/icon.ico") ?> " type="image/x-icon" />
    <title><?= $title ?></title>
</head>

<body>

    <div class="sidebar">
        <header>
            <img src="<?= storage("/UsersPhotos/default.png"); ?>" alt="user photo">
            <h3>Nome do Usuário</h3>
        </header>
        <div class="list">
            <a class="active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a>
                <i class="fas fa-fish"></i>
                <span>Peixes</span>
            </a>
        </div>
    </div>

    <nav class="navbar">
        <div class="left">
            <h1>Laboratório de <span> Biologia </span></h1>
        </div>
        <div class="right">
            <span class="bell"><i class=" icon fas fa-bell"></i></span>0
            <a class="red">
                <i class="fas fa-sign-out-alt icon"></i><span class="sair">Sair</span>
            </a>
        </div>
    </nav>

    <main>
        <?= $v->section("content"); ?>
    </main>

    <!--
    ─── SCRIPTS ────────────────────────────────────────────────────────────────────
    -->

    <script src="<?= shared("/scripts/icons.js", "login"); ?>"></script>
    <?= $v->section("scripts"); ?>
</body>

</html>