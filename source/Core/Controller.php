<?php

namespace Source\Core;

use League\Plates\Engine;

class Controller
{
    protected $view;

    public function __construct($router) 
    {
        $this->view = Engine::create(__DIR__ . "/../../Views", "php");
        $this->view->addData(["router" => $router]);
    }
}