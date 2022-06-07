<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'img_url_first',
        'img_url_second',
        'category_id',
        'user_id',
        'description',
        'details',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
