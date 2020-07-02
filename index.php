<?php

ob_flush();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$route = new Router(url());

$route->namespace("Source\Controllers");

//
// ─── WEB ────────────────────────────────────────────────────────────────────────
//


$route->group(null);
$route->get("/", "Web:home", "web.home");
$route->post("/contato", "MailController:contact", "mail.contact");


//
// ─── AUTH ───────────────────────────────────────────────────────────────────────
//

$route->group(null);
$route->get("/login", "Web:login", "Web.login");
$route->post("/login", "Auth:login", "auth.login");
$route->get("/esqueci-senha", "Web:forget", "Web.forget");
$route->post("/esqueci-senha", "Auth:forget", "auth.forget");
$route->get("/nova-senha", "Web:newPassword", "web.newPassword");
$route->post("/nova-senha", "Auth:newPassword", "auth.newPassword");

//
// ─── ADMIN ──────────────────────────────────────────────────────────────────────
//

    
$route->group("/admin");
$route->get("/", "Web:admin", "web.admin");

$route->get("/projeto", "Web:project", "web.project");
$route->get("/projeto/especie/{specie_id}", "Web:specie", "web.specie");
$route->post("/projeto/pesquisa/", "SpecieController:search", "specie.search");

$route->post("/projeto/create-specie", "SpecieController:create", "specie.create");
$route->put("/projeto/edit-specie", "SpecieController:edit", "specie.edit");
$route->post("/projeto/delete-specie", "SpecieController:delete", "specie.delete");

$route->post("/projeto/create-fish", "FishController:create", "fish.create");
$route->put("/projeto/edit-fish", "FishController:edit", "fish.edit");
$route->post("/projeto/delete-fish", "FishController:delete", "fish.delete");

$route->get("/mensagens", "Web:mails", "web.mails");
$route->get("/mensagens/respondidas", "Web:readedMails", "web.readedmails");
$route->post("/mensagens/make-as-read", "MailController:read", "mail.read");
$route->post("/mensagens/make-as-unread", "MailController:unread", "mail.unread");

$route->get("/usuarios", "Web:users", "web.users");
$route->post("/usuarios/create-users", "UsersController:create", "users.create");
$route->put("/usuarios/edit-users", "UsersController:edit", "users.edit");
$route->post("/usuarios/delete-users", "UsersController:delete", "category.delete");

$route->get("/user", "Web:user", "web.user");
$route->get("/meu-usuario", "Web:user", "web.user");
$route->put("/user/edit-user", "UserController:edit", "user.edit");

//
// ─── ERROR ──────────────────────────────────────────────────────────────────────
//

$route->group("error");
$route->get("/{errcode}", "Web:error", "web.error");

//
// ─── PROCESS ────────────────────────────────────────────────────────────────────
//

$route->dispatch();

if ($route->error()){
    $route->redirect("/error/{$route->error()}");
}



ob_end_flush();

