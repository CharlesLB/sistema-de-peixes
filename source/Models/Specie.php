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

    public function validate(): bool
    {
        if (empty($this->name)){
            $this->fail = new Exception("Insira o nome da espécie!");
            return false;
        }

        if($this->findByName()){
            $this->fail = new Exception("Categoria já cadastrada!");
            return false;
        }
            
        return true;
    }

    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function findByName(): ?object
    {
        $specieByName = $this->find("name = :name", "name={$this->name}")->count();

        if($specieByName){
            return $specieByName;
        }

        return null;
    }
}