<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class Specie extends DataLayer
{
    public function __construct()
    {
        parent::__construct("species", ["name"]);
    }

    public function save(): bool
    {
        if (!$this->validate() || !parent::save()) {
            return false;
        }

        return true;
    }

    public function findByName(): ?array
    {
        $specieByName = $this->find("name = :name", "name={$this->name}")->fetch();

        if($specieByName){
            return $specieByName;
        }

        return null;
    }
    
    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function validate(): bool
    {
        if (empty($this->name)) {
            $this->fail = new Exception("Informe o seu nome");    
            return false;
        }

        if ($this->findByName()) {
            $this->fail = new Exception("Espécie já cadastrada");    
            return false;
        }

        return true;
    }

    
}