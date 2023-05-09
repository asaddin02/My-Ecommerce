<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=> 'Men'
        ]);
        DB::table('categories')->insert([
            'name'=> 'Lady'
        ]);
        DB::table('categories')->insert([
            'name'=> 'Kids'
        ]);
    }
}
