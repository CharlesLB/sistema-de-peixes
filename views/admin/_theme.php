<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= shared("/css/globals.css"); ?>">
    <link rel="stylesheet" href="<?= asset("/css/styles.css?44", "admin"); ?>">
    <link rel="icon" href="<?= shared("/images/icon.ico") ?> " type="image/x-icon" />
    <title><?= $title ?></title>
</head>

<body>
    <div class="wrapper">
        <div class="main_body">
            <div class="top_navbar">
                <div class="logo">
                    <a href="<?= url("/admin") ?>">Laboratório de biologia</a>
                </div>
                <div class="top_menu">
                    <div class="right_info">
                        <div class="icon_wrap">
                            <div class="icon">
                                <span>2</span>
                                <i class="fas fa-bell"></i>
                            </div>
                        </div>
                        <div class="icon_wrap log-out">
                            <div class="icon">
                                <span>Sair</span>
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_menu">
                <div class="inner__sidebar_menu">
                    <div class="user">
                        <img src="<?= storage("UsersPhotos/default.png") ?>" alt="">
                        <span>Nome do Usuário</span>
                    </div>
                    <ul>
                        <li>
                            <a href="<?= url("/admin") ?>" class="<?php if($page == "dashboard"): echo "active"; endif;?>">
                                <span class="icon" >
                                    <i class="fas fa-border-all"></i></span>
                                <span class="list">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= url("/admin/projeto") ?>" class="<?php if($page == "project"): echo "active"; endif;?>">
                                <span class="icon"><i class="fas fa-chart-pie"></i></span>
                                <span class="list">Projeto</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= url("admin/mails") ?>" class="<?php if($page == "mails"): echo "active"; endif;?>">
                                <span class="icon"><i class="fas fa-envelope"></i></span>
                                <span class="list">Notificações</span>
                            </a>
                        </li>

                        <?php if( 1 == 1): ?>
                        <li>
                            <a href="<?= url("admin/users") ?>" class="<?php if($page == "users"): echo "active"; endif;?>">
                                <span class="icon"><i class="fas fa-users"></i></span>
                                <span class="list">Usuários</span>
                            </a>
                        </li>
                        <?php endif; ?>

                        <li>
                            <a href="<?= url("admin/user") ?>" class="<?php if($page == "user"): echo "active"; endif;?>">
                                <span class="icon"><i class="fas fa-user"></i></span>
                                <span class="list">Meu usuário</span>
                            </a>
                        </li>
                        
                    </ul>

                    <div class="hamburger">
                        <div class="inner_hamburger">
                            <span class="arrow">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container">
                <?= $v->section("content"); ?>
            </div>
        </div>
    </div>

    <!--
// ─── SCRIPTS ────────────────────────────────────────────────────────────────────
-->
    <script src="<?= shared("/scripts/jquery.min.js"); ?>"></script>
    <script>
        $(document).ready(function() {
            $(".hamburger").click(function() {
                $(".wrapper").toggleClass("active")
            })
        });
    </script>
    <script src="<?= shared("/scripts/icons.js", "admin"); ?>"></script>
    <?= $v->section("scripts"); ?>

</body>

</html>