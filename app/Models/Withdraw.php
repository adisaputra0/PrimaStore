<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    //
    public $table = "withdraw_requests";
    public $primaryKey = "id";
    public $timestamps = true;

    protected $guarded = ["id"];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
