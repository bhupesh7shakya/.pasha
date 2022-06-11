<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        "product_id",
        "quantity",
        "status",
        "payment_method",
        "user_id",
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
