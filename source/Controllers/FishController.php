<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Fish;

class FishController extends Controller
{
    public function __construct($router) {
        parent::__construct($router);
    }

    public function home()
    {       
        echo $this->view->render("web/home" , [
            "title" => "Home | " . SITE["name"] 
        ]);
    }

    public function create(array $data): void
    {
        return;

        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $fish = new fish();
        $fish->name = ucfirst($data["name"]);

        if (!$fish->validate()) {
            $callback["message"] = message($fish->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        $fish->save();
        $callback["fish"] = $fish;
        $callback["message"] = message("Categoria cadastrada com sucesso!", "success");
        echo json_encode($callback);
    }
}