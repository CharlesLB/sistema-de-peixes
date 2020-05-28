<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= shared("/css/globals.css?v");?>">
    <link rel="stylesheet" href="<?= asset("/css/styles.css?4", "login");?>">
    <link rel="icon" href="<?= shared("/images/icon.ico") ?> " type="image/x-icon" />
    <title><?= $title ?></title>
</head>

<body>

<main>
    <div class="box">
        <?= $v->section("content"); ?>
    </div>
</main>


<!--
// ─── SCRIPTS ────────────────────────────────────────────────────────────────────
-->

<script src= "<?= shared("/scripts/icons.js", "login");?>"></script>

</body>

</html>