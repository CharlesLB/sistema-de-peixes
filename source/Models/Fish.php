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

    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function validate(): bool
    {
        if (empty($this->specie_id)) {
            $this->fail = new Exception("A espécie não foi muito bem especificada");    
            return false;
        }

        if (empty($this->sex) && empty($this->defaultLength) && empty($this->totalLength) && empty($this->weigth)) {
            $this->fail = new Exception("Nenhum campo foi preenchido.");    
            return false;
        }

        return true;
    }

    
}