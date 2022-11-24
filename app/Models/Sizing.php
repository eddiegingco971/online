<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
