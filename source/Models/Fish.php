<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class Fish extends DataLayer
{
    public function __construct()
    {
        parent::__construct("fishes", []);
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
        $fishByName = $this->find("name = :name", "name={$this->name}")->count();

        if($fishByName){
            return $fishByName;
        }

        return null;
    }
    
    
}