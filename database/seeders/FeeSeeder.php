<?php

namespace Database\Seeders;

use App\Models\Fee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fees = [
            [
                'barangay_name'=> 'Poblacion',
                'price'=> '50',
                'status'=> 'active',
            ],
            [
                'barangay_name'=> 'Cantubod',
                'price'=> '50',
                'status'=> 'active',
            ],
        ];
        foreach($fees as $fee){
            Fee::create($fee);
        }
    }
}
