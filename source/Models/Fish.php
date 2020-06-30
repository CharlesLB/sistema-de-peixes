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

        $this->updateSpecieData();

        return true;
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

        if(!$specie->findById($this->specie_id)){
            $this->fail = new Exception("A espécie não foi muito bem especificada");    
            return false;
        }
        

        if (empty($this->sex) && empty($this->defaultLength) && empty($this->totalLength) && empty($this->weigth)) {
            $this->fail = new Exception("Nenhum campo foi preenchido.");    
            return false;
        }

        return true;
    }

    private function updateSpecieData(): void
    {
        $specie = new Specie;

        $selectedSpecie = $specie->findById($this->specie_id)->data();

        $specie->id = $selectedSpecie->id;
        $specie->name = $selectedSpecie->name;

        $specie->mediaWeight = ($selectedSpecie->mediaWeight * ($specie->fishCount() - 1) + $this->weight) / ($specie->fishCount());
        $specie->mediaTotalLength = ($selectedSpecie->mediaTotalLength * ($specie->fishCount()-1) + $this->totalLength) / ($specie->fishCount());
        $specie->mediaDefaultLength = ($selectedSpecie->mediaDefaultLength * ($specie->fishCount()-1) + $this->defaultLength) / ($specie->fishCount());

        $specie->edit(true);
    }
}