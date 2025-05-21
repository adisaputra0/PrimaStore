<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public $table = "transactions";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $guarded = ["id"];
}
