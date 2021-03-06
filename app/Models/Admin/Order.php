<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        "product_id",
        "quantity",
        "payment_method",
        "payment_status",
        "status",
        "is_confirmed",
        "payment_id",
        "user_id",
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
