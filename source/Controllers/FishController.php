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

        $this->fish->specie_id = $data["specie_id"];
        $this->fish->sex = ucfirst($data["sex"]);
        $this->fish->defaultLength = $data["defaultLength"];
        $this->fish->totalLength = $data["totalLength"];
        $this->fish->weight = $data["weight"];

        if (!$this->fish->save()) {
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "danger", "message" => $this->fish->fail()->getMessage()]);
            echo json_encode($callback);
            return;
        }

        $data = $this->specieData();
        
        $callback["mediaWeight"] = floatFormat($data["mediaWeight"]);
        $callback["mediaDefaultLength"] = floatFormat($data["mediaDefaultLength"]);
        $callback["mediaTotalLength"] = floatFormat($data["mediaTotalLength"]);
        $callback["totalFish"] = $data["total"];
        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "success", "message" => "Peixe cadastrado com sucesso"]);
        $callback["fish"] = $this->view->render("admin/fragments/widgets/specie/tableLine", ["fish" => $this->fish]);
        echo json_encode($callback);
    }

    public function read(array $data): void
    {
        return;
    }

    public function edit(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->fish->id = intval($data["id"]);
        $this->fish->specie_id = $this->fish->findById($this->fish->id, "specie_id")->data()->specie_id;
        $this->fish->sex = ucfirst($data["sex"]);
        $this->fish->defaultLength = $data["defaultLength"];
        $this->fish->totalLength = $data["totalLength"];
        $this->fish->weight = $data["weight"];

        if (!$this->fish->save()) {
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "error", "message" => $this->fish->fail()->getMessage()]);
            echo json_encode($callback);
            return;
        }

        $data = $this->specieData();
        
        $callback["mediaWeight"] = floatFormat($data["mediaWeight"]);
        $callback["mediaDefaultLength"] = floatFormat($data["mediaDefaultLength"]);
        $callback["mediaTotalLength"] = floatFormat($data["mediaTotalLength"]);
        $callback["totalFish"] = $data["total"];
        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "success", "message" => "Peixe editado com sucesso"]);
        $callback["fish"] = $this->view->render("admin/fragments/widgets/specie/tableLine", ["fish" => $this->fish]);
        $callback["id"] = $this->fish->id;
        echo json_encode($callback);
    }


    public function delete(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->fish->id = $data["id"];
        $fish = $this->fish->findById($this->fish->id)->data();

        $this->fish->specie_id = $fish->specie_id;
        $this->fish->sex =  $fish->sex;
        $this->fish->defaultLength =  $fish->defaultLength;
        $this->fish->totalLength =  $fish->totalLength;
        $this->fish->weight =  $fish->weight;

        if (!$this->fish->destroy()) {
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "error", "message" => $this->fish->fail()->getMessage()]);
            echo json_encode($callback);
            return;
        };

        $data = $this->specieData();
        
        $callback["mediaWeight"] = floatFormat($data["mediaWeight"]);
        $callback["mediaDefaultLength"] = floatFormat($data["mediaDefaultLength"]);
        $callback["mediaTotalLength"] = floatFormat($data["mediaTotalLength"]);
        $callback["totalFish"] = $data["total"];
        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "success", "message" => "Peixe excluído com sucesso"]);
        $callback["id"] = $this->fish->id;
        echo json_encode($callback);
    }


    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function specieData(): array
    {
        $specie = new Specie;
        $selectedSpecie = $specie->findById($this->fish->specie_id , "id");
        $specie->id = $selectedSpecie->id;

        $data = $specie->showData();

        return $data;
    }
}
