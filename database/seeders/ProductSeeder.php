<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $products = [
        //     [
        //         'product_name' => 'Pizza', 
        //         'quantity' => '10',
        //         'product_sizing' => 'Solo',
        //         'price' => '50'
        //     ],
        //     [
        //         'product_name' => 'Pizza', 
        //         'quantity' => '10',
        //         'product_sizing' => 'Regular',
        //         'price' => '100'
        //     ],
        //     [
        //         'product_name' => 'Lemonade', 
        //         'quantity' => '10',
        //         'product_sizing' => 'Small',
        //         'price' => '50'
        //     ],
        //     [
        //         'product_name' => 'Lemonade', 
        //         'quantity' => '10',
        //         'product_sizing' => 'Medium',
        //         'price' => '80'
        //     ],
        //     [
        //         'product_name' => 'Lemonade', 
        //         'quantity' => '10',
        //         'product_sizing' => 'Large',
        //         'price' => '100'
        //     ],
        // ];
        // foreach($products as $product){
        //     Product::create($product);
        // }

        Product::factory(20)->create();
    }
}
