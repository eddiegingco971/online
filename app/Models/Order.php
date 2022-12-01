<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'tracking_number',
        'order_date',
        'total_amount',
        'quantity',
        'payment_method',
        'payment_status',
        'status',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function products(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
