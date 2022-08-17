<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create(['name' => 'sub_category1']);
        SubCategory::create(['name' => 'sub_category2']);
        SubCategory::create(['name' => 'sub_category3']);
        SubCategory::create(['name' => 'sub_category4']);
        SubCategory::create(['name' => 'sub_category5']);
    }
}
