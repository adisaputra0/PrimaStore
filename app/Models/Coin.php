<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    //
    public $table = "coins";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $guarded = ["id"];
}
