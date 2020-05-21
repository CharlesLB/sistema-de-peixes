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
$route->post("/contato", "Mail:contact", "mail.contact");

$route->get("/login", "Web:login", "web.login");
$route->get("/esqueci-senha", "Web:forget", "web.forget");
$route->get("/confirmar-codigo", "Web:code", "web.code");
$route->get("/nova-senha", "Web:newPassword", "web.newPassword");



//
// ─── ADMIN ──────────────────────────────────────────────────────────────────────
//

    
$route->group("/admin");
$route->get("/", "Web:admin", "web.admin");

$route->get("/especies","Web:species", "web.species");
$route->post("/create-specie", "SpecieController:create", "specie.create");
$route->post("/delete-specie", "SpecieController:delete", "category.delete");

$route->get("/peixe/{specie}", "Web:fishes", "web.fishes");
$route->post("/create-fish", "FishController:create", "word.create");
$route->post("/edit-fish", "FishController:edit", "word.edit");
$route->post("/delete-word", "FishController:delete", "word.delete");


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

