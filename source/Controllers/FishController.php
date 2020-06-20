<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Fish;
use Source\Models\Specie;

class FishController extends Controller
{
    private $fish;

    public function __construct($router)
    {
        parent::__construct($router);

        $this->fish = new Fish;
    }

    public function create(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $specie_id = $this->findSpecieId(ucfirst($data["specie"]));

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
        $callback["message"] = message("Peixe editado com sucesso!", "success");
        echo json_encode($callback);
    }

    public function read(array $data): void
    {
        return;
    }

    public function update(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $specie_id = $this->findSpecieId(ucfirst($data["specie"]));

        $this->fish->id = $data["id"];
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
        $callback["message"] = message("Peixe editado com sucesso!", "success");
        echo json_encode($callback);
    }


    public function delete(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->fish->id = $data['id'];


        if (!$this->fish->destroy()) {
            $callback["message"] = message($this->fish->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        $this->fish->destroy();

        $callback["success"] = true;
        $callback["message"] = message("Peixe deletado com sucesso!", "success");
        echo json_encode($callback);
    }


    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function findSpecieId($specie_name): ?int
    {
        $specie = new Specie;
        $specie->name = $specie_name;
        $specieResults = $specie->findByName();

        if ($specieResults) {
            return $specieResults[0]->id;
        }

        return null;
    }
}
