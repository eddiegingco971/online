<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'email',
        'user_pic',
        'firstname',
        'lastname',
        'age',
        'gender',
        'address',
        'barangay_id',
        'phone_number'
    ];
    public function users(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    public function fees(){
        return $this->hasOne(Fee::class, 'barangay_id', 'id');
    }
}
