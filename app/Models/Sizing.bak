<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;

class Sizing extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sizing_name',
        'price'
    ];

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'sizing_id', 'id');
    }
}
