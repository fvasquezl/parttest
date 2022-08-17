<?php

namespace Database\Seeders;

use App\Models\PartReference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PartReference::create([
            'category_id' => 1,
            'sub_category_id' => 1,
            'name' => 'reference1'
        ]);
        PartReference::create([
            'category_id' => 1,
            'sub_category_id' => 1,
            'name' => 'reference2'
        ]);
        PartReference::create([
            'category_id' => 1,
            'sub_category_id' => 1,
            'name' => 'reference3'
        ]);
        PartReference::create([
            'category_id' => 1,
            'sub_category_id' => 1,
            'name' => 'reference4'
        ]);
        PartReference::create([
            'category_id' => 1,
            'sub_category_id' => 1,
            'name' => 'reference5'
        ]);


    }
}
