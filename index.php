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

$route->get("/especies","Web:species", "web.species");
$route->post("/create-specie", "SpecieController:create", "specie.create");
$route->put("/edit-specie", "SpecieController:edit", "specie.edit");
$route->post("/delete-specie", "SpecieController:delete", "category.delete");

$route->get("/peixe/{specie}", "Web:fishes", "web.fishes");
$route->post("/create-fish", "FishController:create", "word.create");
$route->put("/edit-fish", "FishController:edit", "word.edit");
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

