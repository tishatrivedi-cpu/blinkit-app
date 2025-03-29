<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Pincode extends Model
{
    //
    protected $connection = "mongodb";
    protected $collection = "pincodes";
}
