<?php 

namespace Source\Controllers;

use Source\Core\Controller;

class Web extends Controller
{
    public function __construct() 
    {
        parent::__construct(__DIR__."../../views/" );
    }

    public function home(): void
    {
        echo "home";
    }

    public function error(array $data): void
    {
        echo "Erro:";
        var_dump($data);
    }
}