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
        if (!$this->validate(false, true) || !parent::destroy()) {
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

        $selectedSpecie = $specie->findById($this->specie_id)->data();

        $specie->id = $selectedSpecie->id;
        $specie->name = $selectedSpecie->name;

        if ($method == "create") {
            $specie->mediaWeight = ($selectedSpecie->mediaWeight * ($specie->fishCount() - 1) + $this->weight) / ($specie->fishCount());
            $specie->mediaTotalLength = ($selectedSpecie->mediaTotalLength * ($specie->fishCount() - 1) + $this->totalLength) / ($specie->fishCount());
            $specie->mediaDefaultLength = ($selectedSpecie->mediaDefaultLength * ($specie->fishCount() - 1) + $this->defaultLength) / ($specie->fishCount());
        }

        if ($method == "destroy") {
            if ($specie->fishCount() == 1) {
                $specie->mediaWeight = 0;
                $specie->mediaTotalLength = 0;
                $specie->mediaDefaultLength = 0;
            } else {
                $specie->mediaWeight = ($selectedSpecie->mediaWeight * ($specie->fishCount()) - $this->weight) / ($specie->fishCount() - 1);
                $specie->mediaTotalLength = ($selectedSpecie->mediaTotalLength * ($specie->fishCount()) - $this->totalLength) / ($specie->fishCount() - 1);
                $specie->mediaDefaultLength = ($selectedSpecie->mediaDefaultLength * ($specie->fishCount()) - $this->defaultLength) / ($specie->fishCount() - 1);
            }
        }

        $specie->edit(true);
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
        
        if ($this->sex == "Indefinido" && empty($this->defaultLength) && empty($this->totalLength) && empty($this->weigth)) {
            $this->fail = new Exception("Nenhum campo foi preenchido.");
            return false;
        }

        return true;
    }
}
