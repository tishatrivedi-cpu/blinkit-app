<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $connection = "mongodb";
    protected $collection = "subcategories";
}
