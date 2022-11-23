<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstname' => 'Mac',
                'lastname' => 'Administrator',
                'age' => '40',
                'birthdate' =>  Date::now(),
                'gender' => 'male',
                'address' => 'Sitio Fatima, Poblacion, Danao, Bohol',
                'barangay' => 'Poblacion',
                'phone_number' => '09127891836',
                'email' => 'admin@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password'=> bcrypt('password'),
                'user_type'=> 'admin',
                'status'=> 'active'
            ],
            [
                'firstname' => 'Mac',
                'lastname' => 'Staff',
                'age' => '30',
                'birthdate' =>  Date::now(),
                'gender' => 'male',
                'address' => 'Sitio Fatima, Poblacion, Danao, Bohol',
                'barangay' => 'Poblacion',
                'phone_number' => '09127891837',
                'email' => 'staff@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password'=> bcrypt('password'),
                'user_type'=> 'staff',
                'status'=> 'active'
            ],
            [
                'firstname' => 'Mac',
                'lastname' => 'User',
                'age' => '20',
                'birthdate' => Date::now(),
                'gender' => 'male',
                'address' => 'Sitio Fatima, Poblacion, Danao, Bohol',
                'barangay' => 'Poblacion',
                'phone_number' => '09127891838',
                'email' => 'user@gmail.com',
                'email_verified_at' => Carbon::now(),
                'password'=> bcrypt('password'),
                'user_type'=> 'user',
                'status'=> 'active'
            ],

        ];
        foreach($users as $user){
            User::create($user);
        }

    }
}
