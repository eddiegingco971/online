<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_photo',
        'product_name',
        'description',
        'price',
        'category_id',
        'status'
    ];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function carts(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
