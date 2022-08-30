<?php

namespace Database\Seeders;

use App\Models\Kit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kit::create([
           'category_id'=> 1,
           'sub_category_id'=> 1,
            'name' => 'kit1'
        ]);
        Kit::create([
            'category_id'=> 1,
            'sub_category_id'=> 1,
            'name' => 'kit2'
        ]);
        Kit::create([
            'category_id'=> 1,
            'sub_category_id'=> 1,
            'name' => 'kit3'
        ]);
    }
}
