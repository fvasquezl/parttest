<?php

namespace Database\Seeders;

use App\Models\Box;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Box::create([
            'name' => 'box1'
        ]);
        Box::create([

            'name' => 'box2'
        ]);
        Box::create([
            'name' => 'box3'
        ]);
    }
}
