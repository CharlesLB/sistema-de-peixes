<?php

namespace Source\Controllers;

use Source\Core\Controller;

class Web extends Controller
{
    public function __construct($router) {
        parent::__construct($router);
    }

    public function home()
    {
        echo $this->view->render("web/home" , [
            "title" => "Home | " . SITE["name"] 
        ]);
    }
}