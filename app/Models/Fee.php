<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay_name',
        'price',
        'status',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'barangay_id', 'id');
    }
}
