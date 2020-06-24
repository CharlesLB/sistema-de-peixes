<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Fish;
use Source\Models\Specie;

class Web extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
    }


    // ─── HOME ───────────────────────────────────────────────────────────────────────

    public function home()
    {
        echo $this->view->render("web/home", [
            "title" => "Home | " . SITE["name"]
        ]);
    }

    //
    // ─── AUTH ───────────────────────────────────────────────────────────────────────
    //

    public function login(): void
    {
        echo $this->view->render("login/login", [
            "title" => "Login | " . SITE["name"]
        ]);
    }

    public function forget(): void
    {
        echo $this->view->render("login/forget", [
            "title" => "Esqueci a senha | " . SITE["name"]
        ]);
    }

    public function newPassword(): void
    {
        echo $this->view->render("login/newPassword", [
            "title" => "Nova Senha | " . SITE["name"]
        ]);
    }


    // ─── ADMIN ──────────────────────────────────────────────────────────────────────


    public function admin(): void
    {
        echo $this->view->render("admin/dashboard", [
            "title" => "Administrador | " . SITE["name"],
            "page" => "dashboard",
            "subPage" => "dash"
        ]);
    }

    public function project(): void
    {
        $Specie = new Specie;
        $species = $Specie->show();

        echo $this->view->render("admin/project", [
            "title" => "Projeto | " . SITE["name"],
            "page" => "project",
            "subPage" => "",
            "specie" => "",
            "species" => $species
        ]);
    }

    public function specie(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $Specie = new Specie;
        $Specie->id =  $data['specie_id'];
        $specie = $Specie->find("id = :id", "id={$Specie->id}")->fetch()->data();
        
        $dataSpecie = $Specie->dataFind();

        echo $this->view->render("admin/specie", [
            "title" => $specie->name . " | " . SITE["name"],
            "page" => "project",
            "subPage" => $specie->id,
            "specie" => $specie,
            "dataEspecie" => $dataSpecie,
        ]);
    }

    public function mails(): void
    {
        echo $this->view->render("admin/mails", [
            "title" => "Notificações | " . SITE["name"],
            "page" => "mails",
            "subPage" => "unreadedMails"
        ]);
    }

    public function readedMails(): void
    {
        echo $this->view->render("admin/mails", [
            "title" => "Notificações | " . SITE["name"],
            "page" => "mails",
            "subPage" => "readedMails"
        ]);
    }

    public function users(): void
    {
        echo $this->view->render("admin/users", [
            "title" => "Usuários | " . SITE["name"],
            "page" => "users",
            "subPage" => "dash"
        ]);
    }

    public function user(): void
    {
        echo $this->view->render("admin/user", [
            "title" => "Meu usuário | " . SITE["name"],
            "page" => "user",
            "subPage" => "dash"
        ]);
    }

    // ─── ERROR ──────────────────────────────────────────────────────────────────────

    public function error(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        echo $this->view->render("web/error", [
            "title" => "Error | " . $data["errcode"],
            "error" => $data["errcode"]
        ]);
    }
}
