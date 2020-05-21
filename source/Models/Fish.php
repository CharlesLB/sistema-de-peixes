<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Fish extends DataLayer
{
    public function __construct()
    {
        parent::__construct("fishes", []);
    }
}