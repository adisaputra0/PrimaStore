<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public $table = "reviews";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $guarded = ["id"];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
