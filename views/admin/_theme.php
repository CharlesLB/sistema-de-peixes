<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?= shared("/images/icon.ico") ?> " type="image/x-icon" />

  <link href="<?= shared("vendor/fontawesome/css/all.css") ?>" rel="stylesheet">
  <link href="<?= asset("css/styles.css?ess", "admin") ?>" rel="stylesheet">
  <?= $v->section("styles"); ?>

  <title><?= $title ?></title>
</head>

<body id="page-top">

  <div class="alert-form">
    <div class="alert-form-object"></div>
  </div>

  <div id="wrapper">

    <?php $v->insert("admin/fragments/widgets/theme/sidebar", ["page" => $page]) ?>

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">

              <a class="nav-link dropdown-toggle" href="" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter"><?= $totalMails > 0 ? "+{$totalMails}" : ""; ?></span>
              </a>

              <?php if ($listMails) : ?>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Mensagens
                  </h6>
                  <?php foreach ($listMails as $mail) :
                    $v->insert("admin/fragments/widgets/theme/mini-mail", ["mail" => $mail]);
                  endforeach; ?>
                  <a class="dropdown-item text-center small text-gray-500" href="<?= url("admin/mensagens") ?>">Ver todas as novas mensagens</a>
                </div>
              <?php else : ?>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Mensagens
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="">
                    <div class="mr-3">
                      <div class="icon-circle bg-success">
                        <i class="fas fa-envelope-open text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">Não há novas mensagens</div>
                      <span class="font-weight-bold">Todas as mensagens já foram respondidas!</span>
                    </div>
                  </a>
                  <a class="dropdown-item text-center small text-gray-500" href="<?= url("/admin/mails") ?>">Ver todas as mensagens</a>
                </div>
              <?php endif; ?>

            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Nome do usuário</span>
                <img class="img-profile rounded-circle" src="<?= storage("users/default.png") ?>">
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= url("/admin/myUser") ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Meu usuário
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>
          </ul>
        </nav>

        <!-- Main Content-->
        <div class="container-fluid">
          <?= $v->section("content"); ?>
        </div>

      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; | <a href="<?= SITE["github"] ?>">@CharlesLB</a> e Viviane Serafim</span>
          </div>
        </div>
      </footer>

    </div>
  </div>

  <!-- Arrow up -->
  <a class="scroll-to-top rounded" href="#">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Modals -->
  <?php $v->insert("admin/fragments/modals/logout") ?>
  <?= $v->section("modals"); ?>

  <!-- Scripts -->
  <script src="<?= shared("scripts/jquery.min.js") ?>"></script>
  <script src="<?= shared("scripts/bootstrap.min.js") ?>"></script>
  <script src="<?= shared("scripts/popper.min.js") ?>"></script>
  <script src="<?= shared("scripts/icons.js"); ?>"></script>
  <script src="<?= asset("scripts/scripts.min.js", "admin") ?>"></script>

  <?= $v->section("scripts"); ?>

</body>

</html>