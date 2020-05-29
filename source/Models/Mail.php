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

    public function send(string $subject, string $body, string $recipient_name = MAIL["from_name"], string $recipient_mail = MAIL["from_email"]): void
    {
        $this->Email->add( $subject, $body, $recipient_name, $recipient_mail)->send();
    }

    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function validate(): bool
    {
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

        return true;
    }
    
    
}