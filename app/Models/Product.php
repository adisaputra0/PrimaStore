<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $table = "products";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
