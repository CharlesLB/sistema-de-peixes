<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Specie extends DataLayer
{
    public function __construct()
    {
        parent::__construct("species", ["name"]);
    }
}