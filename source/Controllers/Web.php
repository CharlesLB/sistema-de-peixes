<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Fish;
use Source\Models\Mail;
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
        $specie = new Specie;
        $totalSpecie = $specie->find()->count();

        $fish = new Fish;
        $totalFish = $fish->find()->count();

        $mail = new Mail;
        $listMails = $mail->listUnreaded();
        $totalMails = $mail->countUnreaded();
        $totalReadedMails = $mail->find()->count();

        echo $this->view->render("admin/dashboard", [
            "title" => "Administrador | " . SITE["name"],
            "page" => "dashboard",
            "totalSpecie" => $totalSpecie,
            "totalFish" => $totalFish,
            "listMails" => $listMails,
            "totalMails" => $totalMails,
            "totalReadedMails" => $totalReadedMails
        ]);
    }

    public function project(): void
    {
        $Specie = new Specie;
        $species = $Specie->show();

        $mail = new Mail;
        $listMails = $mail->listUnreaded();
        $totalMails = $mail->countUnreaded();

        echo $this->view->render("admin/project", [
            "title" => "Projeto | " . SITE["name"],
            "page" => "project",
            "species" => $species,
            "listMails" => $listMails,
            "totalMails" => $totalMails
        ]);
    }

    public function specie(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $Specie = new Specie;
        $Specie->id =  $data['specie_id'];
        $specie = $Specie->find("id = :id", "id={$Specie->id}")->fetch()->data();
        
        $fishes = $Specie->fishesFind();
        $data = $Specie->showData();

        $mail = new Mail;
        $listMails = $mail->listUnreaded();
        $totalMails = $mail->countUnreaded();

        echo $this->view->render("admin/specie", [
            "title" => $specie->name . " | " . SITE["name"],
            "page" => "project",
            "specie" => $specie,
            "data" => $data,
            "fishes" => $fishes,
            "listMails" => $listMails,
            "totalMails" => $totalMails
        ]);
    }

    public function mails(): void
    {
        $mail = new Mail;
        $mails = $mail->listUnreaded(true);
        
        $listMails = $mail->listUnreaded();
        $totalMails = $mail->countUnreaded();

        echo $this->view->render("admin/mails", [
            "title" => "Notificações | " . SITE["name"],
            "page" => "mails",
            "reads" => false,
            "listMails" => $listMails,
            "totalMails" => $totalMails,
            "mails" => $mails
        ]);
    }

    public function readedMails(): void
    {
        $mail = new Mail;
        $mails = $mail->listReaded();

        $listMails = $mail->listUnreaded();
        $totalMails = $mail->countUnreaded();

        echo $this->view->render("admin/mails", [
            "title" => "Notificações | " . SITE["name"],
            "page" => "mails",
            "reads" => true,
            "listMails" => $listMails,
            "totalMails" => $totalMails,
            "mails" => $mails
        ]);
    }

    public function users(): void
    {
        $mail = new Mail;
        $listMails = $mail->listUnreaded();
        $totalMails = $mail->countUnreaded();

        echo $this->view->render("admin/users", [
            "title" => "Usuários | " . SITE["name"],
            "page" => "users",
            "listMails" => $listMails,
            "totalMails" => $totalMails
        ]);
    }

    public function user(): void
    {
        $mail = new Mail;
        $listMails = $mail->listUnreaded();
        $totalMails = $mail->countUnreaded();

        echo $this->view->render("admin/user", [
            "title" => "Meu usuário | " . SITE["name"],
            "page" => "user",
            "listMails" => $listMails,
            "totalMails" => $totalMails
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
