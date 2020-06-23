<?php

namespace Source\Controllers;

use Source\Core\Controller;
use Source\Models\Specie;

class SpecieController extends Controller
{
    private $specie;

    public function __construct($router)
    {
        parent::__construct($router);

        $this->specie = new Specie;
    }

    public function create(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->specie->name = $data["name"];

        if (!$this->specie->save()) {
            $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "danger", "message" => $this->specie->fail()->getMessage()]);
            $callback["success"] = false;
            echo json_encode($callback);
            return;
        }

        $this->specie->save();

        $callback["success"] = true;
        $callback["alert"] = $this->view->render("admin/fragments/widgets/general/alert", ["type" => "success", "message" => "Espécie {$this->specie->name} foi cadastrada com sucesso! :)"]);
        $callback["specie"] = $this->view->render("admin/fragments/widgets/project/specie", ["specie" => $this->specie]);
        echo json_encode($callback);
    }

    public function search(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);
        $term = $data["search"];

        $species = $this->specie->show($term);

        if(!$species){
            $callback["message"] = $this->view->render("admin/fragments/widgets/general/message", ["type" => "error", "message" => $this->specie->fail()->getMessage()]);
        }else{
            $callback["species"] = $this->view->render("admin/fragments/pages/project/species", ["species" => $species]);
        }
        echo json_encode($callback);
    }

    public function update(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->specie->id = $data["id"];
        $this->specie->name = ucfirst($data["name"]);

        if (!$this->specie->save()) {
            $callback["message"] = $this->view->render("admin/fragments/widgets/general/message", ["type" => "error", "message" => $this->specie->fail()->getMessage()]);
            echo json_encode($callback);
            return;
        }

        $this->specie->save();

        $callback["success"] = true;
        $callback["message"] = $this->view->render("admin/fragments/widgets/general/message", ["type" => "error", "message" => $this->specie->fail()->getMessage()]);
        echo json_encode($callback);
    }

    public function delete(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->specie->id = $data["id"];

        if (!$this->specie->destroy()) {
            $callback["message"] = $this->view->render("admin/fragments/widgets/general/message", ["type" => "error", "message" => $this->specie->fail()->getMessage()]);
            echo json_encode($callback);
            return;
        }

        $this->specie->destroy();

        $callback["success"] = true;
        $callback["message"] = $this->view->render("admin/fragments/widgets/general/message", ["type" => "error", "message" => $this->specie->fail()->getMessage()]);
        echo json_encode($callback);
    }
}
