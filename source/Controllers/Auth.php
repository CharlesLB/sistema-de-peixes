<?php

namespace Source\Controllers;

use Source\Core\Controller;

class Auth extends Controller
{
    public function __construct($router) {
        parent::__construct($router);
    }

    // ─── LOGIN ──────────────────────────────────────────────────────────────────────

    public function login(?array $data): void
    {   
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);
        
        if($data){
            var_dump($data);
        }
        
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
    
}