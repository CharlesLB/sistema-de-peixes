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

    //
    // ─── AUTH ───────────────────────────────────────────────────────────────────────
    //

    public function login(): void
    {       
        echo $this->view->render("login/login" , [
            "title" => "Login | " . SITE["name"] 
        ]);
    }

    public function forget(): void
    {       
        echo $this->view->render("login/forget" , [
            "title" => "Esqueci a senha | " . SITE["name"] 
        ]);
    }

    public function newPassword(): void
    {       
        echo $this->view->render("login/newPassword" , [
            "title" => "Nova Senha | " . SITE["name"] 
        ]);
    }


    // ─── ADMIN ──────────────────────────────────────────────────────────────────────


    public function admin()
    {       
        echo $this->view->render("admin/dashboard" , [
            "title" => "Administrador | " . SITE["name"] 
        ]);
    }

    // ─── ERROR ──────────────────────────────────────────────────────────────────────

    public function error(array $data): void
    {
       echo $this->view->render("web/error", [
            "title" => "Error | " . $data["errcode"],
            "error" => $data["errcode"]
        ]);
    }
}