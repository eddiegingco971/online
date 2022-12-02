<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Sizing;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function carts(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function orderItems(){
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }

    public function orders(){
        return $this->belongsTo(Order::class, 'product_id', 'id');
    }
}
