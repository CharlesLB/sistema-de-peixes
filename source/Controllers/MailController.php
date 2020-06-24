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
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "danger", "message" => $this->specie->fail()->getMessage()]);
            echo json_encode($callback);
            return;
        }

        $this->mail->save();
        # $this->mail->send("Nova mensagem do {$this->mail->name}", $this->mail->message );

        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "success", "message" => "E-mail enviado com sucesso! :)"]);
        echo json_encode($callback);
    }
}
