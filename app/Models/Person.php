<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Person extends Model
{
    protected $connection = "mongodb";
    protected $collection = "people";
}
