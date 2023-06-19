<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'name'=> 'Shoes',
            'for'=> 'Man',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Shoes',
            'for'=> 'Woman',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Shoes',
            'for'=> 'Kids',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Pants',
            'for'=> 'Man',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Pants',
            'for'=> 'Woman',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Pants',
            'for'=> 'Kids',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Tshirt',
            'for'=> 'Man',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Tshirt',
            'for'=> 'Woman',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Tshirt',
            'for'=> 'Kids',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Jacket',
            'for'=> 'Man',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Jacket',
            'for'=> 'Woman',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Jacket',
            'for'=> 'Kids',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Hat',
            'for'=> 'Man',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Hat',
            'for'=> 'Woman',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name'=> 'Hat',
            'for'=> 'Kids',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
    }
}
