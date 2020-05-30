<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Fish;
use Source\Models\Specie;

class FishController extends Controller
{
    private $fish;

    public function __construct($router) {
        parent::__construct($router);

        $this->fish = new Fish;
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

        $specie_id = $this->verifySpecie(ucfirst($data["specie"]));

        $this->fish->specie_id = $specie_id;   
        $this->fish->sex = ucfirst($data["sex"]);
        $this->fish->defaultLength = $data["defaultLength"];
        $this->fish->totalLength = $data["totalLength"];
        $this->fish->weigth = $data["weigth"];

        if (!$this->fish->save()) {
            $callback["message"] = message($this->fish->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        $this->fish->save();

        $callback["success"] = true;
        $callback["message"] = message("Espécie cadastrada com sucesso!", "success");
        echo json_encode($callback);
    }

    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function verifySpecie($specie_name): ?int
    {
        $specie = new Specie;
        $specie->name = $specie_name ;
        $specieResults = $specie->findByName();

        if($specieResults){
            return $specieResults[0]->id;
        }
        
        return null;
    }
}