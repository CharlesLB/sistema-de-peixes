<?php

namespace Source\Controllers;

use Exception;
use Source\Core\Controller;
use Source\Models\Specie;

class SpecieController extends Controller
{

    private $error;
    private $specie;

    public function __construct($router) {
        parent::__construct($router);

        $specie = new Specie;
        $error = new Exception();
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

        $specie = new specie();
        $specie->name = ucfirst($data["name"]);

        if (!$specie->validate()) {
            $callback["message"] = message($specie->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        $specie->save();
        $callback["specie"] = $specie;
        $callback["message"] = message("Categoria cadastrada com sucesso!", "success");
        echo json_encode($callback);
    }
}