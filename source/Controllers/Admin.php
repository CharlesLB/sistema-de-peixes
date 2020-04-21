<?php 

namespace Source\Controllers;

use Source\Core\Controller;

class Admin extends Controller
{
    public function __construct() 
    {
        parent::__construct(__DIR__."../../views/" );
    }

    public function index(): void
    {
        echo "home";
    }

    public function error(array $data): void
    {
        echo $this->view->render("error", [
           "title" => "{$data['errcode']} | Error"
        ]);
    }
}