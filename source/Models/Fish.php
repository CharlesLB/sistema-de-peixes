<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\Specie;
use Exception;

class Fish extends DataLayer
{
    public function __construct()
    {
        parent::__construct("fishes", ["specie_id"]);
    }

    public function save(): bool
    {
        if (!$this->validate() || !parent::save()) {
            return false;
        }

        return true;
    }

    public function edit(bool $updateData = false): bool
    {
        if (!$this->validate(true) || !parent::save()) {
            return false;
        }

        $this->updateSpecieData("create");

        return true;
    }

    public function destroy(): bool
    {
        if (!parent::destroy()) {
            return false;
        }

        $this->updateSpecieData("destroy");
        return true;
    }

    //
    // ─── AUXILIAR FUNCTIONS ─────────────────────────────────────────────────────────
    //


    public function updateSpecieData(string $method = "create"): void
    {
        $specie = new Specie;
        $specie->updateData($method, $this);
    }


    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function validate(): bool
    {
        $specie = new Specie;

        if (empty($this->specie_id)) {
            $this->fail = new Exception("A espécie não foi muito bem especificada");
            return false;
        }

        if (!$specie->findById($this->specie_id)) {
            $this->fail = new Exception("A espécie não foi muito bem especificada");
            return false;
        }

        if ($this->sex == "Indefinido" && empty($this->defaultLength) && empty($this->totalLength) && empty($this->weight)) {
            $this->fail = new Exception("Nenhum campo foi preenchido.");
            return false;
        }

        return true;
    }
}
