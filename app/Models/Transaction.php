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
    
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
