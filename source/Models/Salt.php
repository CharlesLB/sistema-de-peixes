<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class Salt extends DataLayer
{
    public function __construct()
    {
        parent::__construct("salts", ["user_id", "email", "message"], "user_id");
    }

}