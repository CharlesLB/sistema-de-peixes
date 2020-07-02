<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;
use Source\Support\Email;

class Mail extends DataLayer
{
    private $Email;

    public function __construct()
    {
        parent::__construct("mails", ["name", "email", "message"]);

        $this->Email = new Email;
    }

    public function save(): bool
    {
        if (!$this->validate() || !parent::save()) {
            return false;
        }

        return true;
    }

    public function edit(): bool
    {
        if (!$this->validate(true) || !parent::save()) {
            return false;
        }

        return true;
    }

    public function destroy(): bool
    {
        if (!$this->validate(true) || !parent::save()) {
            return false;
        }

        return true;
    }


    public function send(string $subject, string $body, string $recipient_name = MAIL["from_name"], string $recipient_mail = MAIL["from_email"]): void
    {
        $this->Email->add($subject, $body, $recipient_name, $recipient_mail)->send();
    }

    //
    // ─── AUXILIAR FUNCTION ──────────────────────────────────────────────────────────
    //

    public function listReaded(): ?array
    {
        $listMails = $this->find("status = :status" , "status=respondido")->order("created_at DESC")->fetch(true);
        return $listMails;
    }

    public function listUnreaded(bool $all = false): ?array
    {
        if ($all) {
            $listMails = $this->find("status = :status" , "status=pendente")->order("created_at DESC")->fetch(true);
        }else{
            $listMails = $this->find("status = :status" , "status=pendente")->order("created_at DESC")->limit(3)->fetch(true);
        }

        return $listMails;
    }

    public function countUnreaded(): int
        {
        $totalMails = $this->find("status = :status" , "status=pendente")->count();

        return $totalMails;
    }

    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function validate(bool $deleteOrUpdate = false): bool
    {
        if($deleteOrUpdate){
            if (!$this->findById($this->id)) {
                $this->fail = new Exception("Essa mensagem já foi excluída ou nunca existiu");
                return false;
            }
        }else{
            if (empty($this->name)) {
                $this->fail = new Exception("Informe o seu nome");
                return false;
            }
    
            if (empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->fail = new Exception("Informe um e-mail válido");
                return false;
            }
    
            if (empty($this->message)) {
                $this->fail = new Exception("Informe a mensagem");
                return false;
            }
        }

        return true;
    }
}
