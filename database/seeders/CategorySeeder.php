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
        Category::create(['name' => 'category1']);
        Category::create(['name' => 'category2']);
        Category::create(['name' => 'category3']);
        Category::create(['name' => 'category4']);
        Category::create(['name' => 'category5']);
    }
}
