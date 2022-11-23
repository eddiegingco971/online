<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tracking_number',
        'order_date',
        'total_amount',
        'quantity',
        'payment_method',
        'payment_status',
        'status',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
