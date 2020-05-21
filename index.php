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
$route->get("/nova-senha", "Web:newPassword", "web.newPassword");



//
// ─── ADMIN ──────────────────────────────────────────────────────────────────────
//

    
$route->group("/admin");
$route->get("/", "Web:admin", "web.admin");

$route->get("/categoria","Web:category", "web.category");
$route->post("/create-category", "CategoryController:create", "category.create");
$route->post("/delete-category", "CategoryController:delete", "category.delete");

$route->get("/palavra", "Web:word", "web.word");
$route->post("/create-word", "WordController:create", "word.create");
$route->post("/delete-word", "WordController:delete", "word.delete");
$route->post("/show-word", "WordController:show", "word.show");



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

