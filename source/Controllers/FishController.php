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

        $Specie = new Specie;
        $specie = $Specie->findById($this->fish->specie_id);

        $callback["mediaWeight"] = $specie->mediaWeight;
        $callback["mediaDefaultLength"] = $specie->mediaDefaultLength;
        $callback["mediaTotalLength"] = $specie->mediaTotalLength;
        $callback["totalFish"] = $Specie->fishCount($specie->id);
        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "success", "message" => "Peixe cadastrado com sucesso"]);
        $callback["fish"] = $this->view->render("admin/fragments/widgets/specie/tableLine", ["fish" => $this->fish]);
        echo json_encode($callback);
    }

    public function read(array $data): void
    {
        return;
    }

    public function update(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->fish->id = $data["id"];
        $this->fish->sex = ucfirst($data["sex"]);
        $this->fish->defaultLength = $data["defaultLength"];
        $this->fish->totalLength = $data["totalLength"];
        $this->fish->weigth = $data["weigth"];

        if (!$this->fish->save()) {
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "error", "message" => $this->specie->fail()->getMessage()]);
            echo json_encode($callback);
            return;
        }

        $this->fish->save();

        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "error", "message" => $this->specie->fail()->getMessage()]);
        echo json_encode($callback);
    }


    public function delete(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->fish->id = $data['id'];


        if (!$this->fish->destroy()) {
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "error", "message" => $this->fish->fail()->getMessage()]);
            echo json_encode($callback);
            return;
        }

        $this->fish->destroy();

        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "error", "message" => $this->fish->fail()->getMessage()]);
        echo json_encode($callback);
    }


    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //


}
