<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
