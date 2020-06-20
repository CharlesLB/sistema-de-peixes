<?php

namespace Source\Controllers;

use Exception;
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
            $callback["message"] = message($this->specie->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        $this->specie->save();

        $callback["success"] = true;
        $callback["message"] = message("Espécie cadastrada com sucesso!", "success");
        $callback["specie"] = $this->view->render("admin/fragments/widgets/project/newSpecieCard", ["specie" => $this->specie]);
        echo json_encode($callback);
    }

    public function read(array $data): void
    {
        return;
    }

    public function update(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->specie->id = $data["id"];
        $this->specie->id = $data["name"];

        if (!$this->specie->save()) {
            $callback["message"] = message($this->specie->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        $this->specie->save();

        $callback["success"] = true;
        $callback["message"] = message("Espécie editada com sucesso!", "success");
        echo json_encode($callback);
    }

    public function delete(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRING);

        $this->specie->id = $data["id"];

        if (!$this->specie->destroy()) {
            $callback["message"] = message($this->specie->fail()->getMessage(), "error");
            echo json_encode($callback);
            return;
        }

        $this->specie->destroy();

        $callback["success"] = true;
        $callback["message"] = message("Espécie deletada com sucesso!", "success");
        echo json_encode($callback);
    }
}
