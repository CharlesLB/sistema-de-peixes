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

    public function project(array $data): void
    {
        $Specie = new Specie;
        $species = $Specie->find()->fetch(true);

        if (!$data) {
            echo $this->view->render("admin/dashboard", [
                "title" => "Projeto | " . SITE["name"],
                "page" => "project",
                "subPage" => "",
                "specie" => "",
                "species" => $species
            ]);
        } else {
            $SelectedSpecie = $Specie->find("id = :id", "id={$data['specie_id']}")->fetch()->data();
            

            $fish = new Fish;
            $fishesOfThisSpecie = $fish->find("specie_id = :specie_id", "specie_id={$SelectedSpecie->id}")->fetch(true);
            $numberFishes = $fish->find("specie_id = :specie_id", "specie_id={$SelectedSpecie->id}")->count();

            echo json_encode($SelectedSpecie->name);

            echo $this->view->render("admin/project", [
                "title" => "Projeto | " . SITE["name"],
                "page" => "project",
                "subPage" => $SelectedSpecie->id,
                "species" => $species,
                "specie" => $SelectedSpecie,
                "numberFishes" => $numberFishes,
                "fishesOfThisSpecie" => $fishesOfThisSpecie,
            ]);
        }
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
        echo $this->view->render("web/error", [
            "title" => "Error | " . $data["errcode"],
            "error" => $data["errcode"]
        ]);
    }
}
