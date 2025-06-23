<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    //
    public $table = "wallets";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $guarded = ["id"];
}
