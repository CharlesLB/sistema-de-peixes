<?php

namespace Source\Models;

use CoffeeCode\DataLayer\Connect;
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

    public function show(string $term = null): ?array
    {
        $conn = Connect::getInstance();
        $query = $conn->query("SELECT id, name FROM species WHERE name LIKE '%$term%' ORDER BY name ASC");
        $species = $query->fetchAll();

        if (!$species) {
            $this->fail = new Exception("Nenhuma espécie foi encontrada. Talvez a espécie ainda não foi cadastrada ou o texto inserido está incorreto.");
            return null;
        }

        return $species;
    }

    public function edit(): bool
    {
        if (!$this->validate(true) || !parent::save()) {
            return false;
        }

        return true;
    }

    public function destroy(): bool
    {
        if (!$this->validate(false, true) || !parent::destroy()) {
            return false;
        }

        $this->deleteFishesOfThisSpecie();
        return true;
    }

    //
    // ─── AUXILIAR FUNCTIONS ─────────────────────────────────────────────────────────
    //

    public function findByName(): ?Object
    {
        $specieByName = $this->find("name = :name", "name={$this->name}")->fetch();

        if ($specieByName) {
            return $specieByName;
        }

        return null;
    }

    public function dataFind(): array
    {
        $data[] = "";
        $fish = new Fish;

        $data["fishes"] = $fish->find("specie_id = :specie_id", "specie_id={$this->id}")->fetch(true);
        $data["total"] = $fish->find("specie_id = :specie_id", "specie_id={$this->id}")->count();

        $totalWeight = 0;
        $totalTotalLenght = 0;
        $totalDefaultLenght = 0;

        if ($data["fishes"]) {
            foreach ($data["fishes"] as $fish) {
                $totalWeight += $fish->weight;
                $totalTotalLenght += $fish->totalLenght;
                $totalDefaultLenght += $fish->defaultLenght;
            }

            $data["totalWeight"] = $totalWeight / $data["total"];
            $data["totalTotalLenght"] = $totalTotalLenght / $data["total"];
            $data["totalDefaultLenght"] = $totalDefaultLenght / $data["total"];
        }

        return $data;
    }

    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function validate(bool $update = false, bool $delete = false): bool
    {
        if ($update || $delete) {
            if (!$this->findById($this->id)) {
                $this->fail = new Exception("Essa espécie já foi excluída.");
                return false;
            }
        }

        if (!$delete) {
            if (empty($this->name)) {
                $this->fail = new Exception("Informe o nome da espécie");
                return false;
            }

            if ($this->findByName()) {
                $this->fail = new Exception("Espécie já cadastrada");
                return false;
            }
        }

        return true;
    }

    private function deleteFishesOfThisSpecie(): void
    {
        $fish = new Fish;

        $fishesOfThisSpecie = $fish->find("specie_id = :specie_id", "specie_id={$this->id}")->fetch(true);

        if ($fishesOfThisSpecie) {
            foreach ($fishesOfThisSpecie as $fish) {
                $fish->destroy();
            }
        }
    }
}
