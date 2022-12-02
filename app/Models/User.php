<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'age',
        'birthdate',
        'gender',
        'address',
        'barangay_id',
        'phone_number',
        'email',
        'password',
        'user_type',
        'status',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function profiles(){
    //     return $this->belongsTo(Profile::class);
    // }
    public function fees(){
        return $this->belongsTo(Fee::class, 'barangay_id', 'id');
    }
    public function orders(){
        return $this->belongsTo(Order::class, 'user_id', 'id');
    }
    public function orderItems(){
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}
