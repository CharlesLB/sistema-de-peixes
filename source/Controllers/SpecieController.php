<?php

namespace Source\Controllers;

use Exception;
use Source\Core\Controller;
use Source\Models\Specie;

class SpecieController extends Controller
{
    private $specie;

    public function __construct($router) {
        parent::__construct($router);

        $this->specie = new Specie;
    }

    public function home()
    {       
        echo $this->view->render("web/home" , [
            "title" => "Home | " . SITE["name"] 
        ]);
    }

    public function create(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->specie->name = $data["name"];
        
        if (!$this->specie->save()) {
            $callback["message"] = message($this->specie->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        $this->specie->save();

        $callback["success"] = true;
        $callback["message"] = message("Espécie cadastrada com sucesso!", "success");
        echo json_encode($callback);
    }
}