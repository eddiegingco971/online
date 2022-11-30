<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FeeSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(SliderSeeder::class);

        // $this->call(CustomerSeeder::class);
        // $this->call(OrderSeeder::class);
        // \App\Models\Slider::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
