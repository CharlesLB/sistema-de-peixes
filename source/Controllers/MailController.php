<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Mail;

class MailController extends Controller
{

    private $mail;

    public function __construct($router)
    {
        parent::__construct($router);

        $this->mail = new Mail;
    }

    public function contact(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->mail->name = $data["name"];
        $this->mail->email = $data["email"];
        $this->mail->message = $data["message"];

        if (!$this->mail->save()) {
            $callback["alert"] = message($this->mail->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        # $this->mail->send("Nova mensagem do {$this->mail->name}", $this->mail->message );

        $callback["success"] = true;
        $callback["alert"] = message('Email enviado com sucesso', "success");
        echo json_encode($callback);
    }

    public function read(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->mail->id = $data["id"];
        $selectedMail = $this->mail->findById($this->mail->id);

        $this->mail->name = $selectedMail->name;
        $this->mail->email = $selectedMail->email;
        $this->mail->message = $selectedMail->message;

        $this->mail->status = "respondido";

        if (!$this->mail->edit()) {
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "danger", "message" => $this->mail->fail()->getMessage()]);
            $callback["success"] = false;
            echo json_encode($callback);
            return;
        }

        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "success", "message" => "Mensagem editada com sucesso :)"]);
        echo json_encode($callback);
    }

    public function unread(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->mail->id = $data["id"];
        $selectedMail = $this->mail->findById($this->mail->id);

        $this->mail->name = $selectedMail->name;
        $this->mail->email = $selectedMail->email;
        $this->mail->message = $selectedMail->message;

        $this->mail->status = "pendente";

        if (!$this->mail->edit()) {
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "danger", "message" => $this->mail->fail()->getMessage()]);
            $callback["success"] = false;
            echo json_encode($callback);
            return;
        }

        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "success", "message" => "Mensagem editada com sucesso :)"]);
        echo json_encode($callback);
    }
}
