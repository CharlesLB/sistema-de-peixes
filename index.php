<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$route = new Router(url(), ":");


//
// ─── ROUTES ──────────────────────────────────────────────────────────────────────
//

$route->namespace("Source\Controllers");
$route->get("/", "Web:index");

$route->namespace("Source\Controllers")->group("/admin");
$route->get("/", "Admin:index");

$route->namespace("Source\Controllers")->group("/error");
$route->get("/{errcode}", "Web:error");

//
// ─── DISPATCH ───────────────────────────────────────────────────────────────────
//

$route->dispatch();

if($route->error()){
    $route->redirect("/error/{$route->error()}");
}

ob_end_flush();