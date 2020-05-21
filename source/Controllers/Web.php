<?php

namespace Source\Controllers;

use Source\Core\Controller;

class Web extends Controller
{
    public function __construct($router) {
        parent::__construct($router);
    }


    // ─── HOME ───────────────────────────────────────────────────────────────────────

    public function home()
    {       
        echo $this->view->render("web/home" , [
            "title" => "Home | " . SITE["name"] 
        ]);
    }

    // ─── LOGIN ──────────────────────────────────────────────────────────────────────

    public function login()
    {       
        echo $this->view->render("login/login" , [
            "title" => "Login | " . SITE["name"] 
        ]);
    }

    public function forget()
    {       
        echo $this->view->render("login/forget" , [
            "title" => "Esqueci a senha | " . SITE["name"] 
        ]);
    }

    public function code()
    {       
        echo $this->view->render("login/code" , [
            "title" => "Confirmar código | " . SITE["name"] 
        ]);
    }

    public function newPassword()
    {       
        echo $this->view->render("login/newPassword" , [
            "title" => "Nova Senha | " . SITE["name"] 
        ]);
    }


    // ─── ADMIN ──────────────────────────────────────────────────────────────────────


    // ─── ERROR ──────────────────────────────────────────────────────────────────────

    public function error(array $data): void
    {
       echo $this->view->render("web/error", [
            "title" => "Error | " . $data["errcode"],
            "error" => $data["errcode"]
        ]);
    }
}