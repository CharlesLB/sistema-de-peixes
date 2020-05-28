<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("users", ["id", "first_name", "last_name" , "email", "password"]);
    }
}