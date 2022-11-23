<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $categories = [
        //     [
        //         'category_name' => 'Snacks',
        //         'product_id' => '1'

        //     ],
        //     [
        //         'category_name' => 'Drinks',
        //         'product_id' => '2'
        //     ],
        // ];
        // foreach($categories as $category){
        //     Category::create($category);
        // }

        Category::factory(4)->create();
    }
}
