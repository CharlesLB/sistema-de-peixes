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

    public function edit(bool $updateData = false): bool
    {
        if ($updateData) {
            if (!$this->validate(false, true) || !parent::save()) {
                return false;
            }
        } else {
            if (!$this->validate(true) || !parent::save()) {
                return false;
            }
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

    public function findByName(string $name = null): ?Object
    {
        if(!$name){
            $specieByName = $this->find("name = :name", "name={$this->name}")->fetch();
        }else{
            $specieByName = $this->find("name = :name", "name={$name}")->fetch();
        }

        if ($specieByName) {
            return $specieByName;
        }

        return null;
    }

    public function fishCount(int $id = null): int
    {
        $fish = new Fish;
        if (!$id) {
            $total = $fish->find("specie_id = :specie_id", "specie_id={$this->id}")->count();
        } else {
            $total = $fish->find("specie_id = :specie_id", "specie_id={$id}")->count();
        }

        return $total;
    }

    public function fishFind(): ?array
    {
        $fish = new Fish;

        $fishes = $fish->find("specie_id = :specie_id", "specie_id={$this->id}")->fetch(true);

        return $fishes;
    }

    public function updateData(string $method, Fish $fish): void
    {
        $selectedSpecie = $this->findById($fish->specie_id)->data();

        $this->id = $selectedSpecie->id;
        $this->name = $selectedSpecie->name;

        if ($method == "create") {
            $this->mediaWeight = ($selectedSpecie->mediaWeight * ($this->fishCount() - 1) + $fish->weight) / ($this->fishCount());
            $this->mediaTotalLength = ($selectedSpecie->mediaTotalLength * ($this->fishCount() - 1) + $fish->totalLength) / ($this->fishCount());
            $this->mediaDefaultLength = ($selectedSpecie->mediaDefaultLength * ($this->fishCount() - 1) + $fish->defaultLength) / ($this->fishCount());
        }

        if ($method == "destroy") {
            if ($this->fishCount() == 1) {
                $this->mediaWeight = 0;
                $this->mediaTotalLength = 0;
                $this->mediaDefaultLength = 0;
            } else {
                $this->mediaWeight = ($selectedSpecie->mediaWeight * ($this->fishCount()) - $fish->weight) / ($this->fishCount() - 1);
                $this->mediaTotalLength = ($selectedSpecie->mediaTotalLength * ($this->fishCount()) - $fish->totalLength) / ($this->fishCount() - 1);
                $this->mediaDefaultLength = ($selectedSpecie->mediaDefaultLength * ($this->fishCount()) - $fish->defaultLength) / ($this->fishCount() - 1);
            }
        }

        $this->edit(true);
    }

    //
    // ─── PRIVATE FUNCTIONS ──────────────────────────────────────────────────────────
    //

    private function validate(bool $update = false, bool $deleteOrDataChange = false): bool
    {
        if ($update || $deleteOrDataChange) {
            if (!$this->findById($this->id)) {
                $this->fail = new Exception("Essa espécie já foi excluída.");
                return false;
            }
        }

        if (!$deleteOrDataChange) {
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
