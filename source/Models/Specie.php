<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\Fish;
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

    public function destroy(): bool
    {
        if (!parent::destroy() || !$this->deleteFishesOfThisSpecie()) {
            return false;
        }

        return true;
    }

    //
    // ─── AUXILIAR FUNCTIONS ─────────────────────────────────────────────────────────
    //

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

    private function deleteFishesOfThisSpecie(): void
    {
        $fish = new Fish;

        $fishesOfThisSpecie = $fish->find("specie_id = :specie_id", "specie_id={$this->id}")->fetch(true);

        foreach ($fishesOfThisSpecie as $fish) {
            $fish->destroy();
        }
    }
}