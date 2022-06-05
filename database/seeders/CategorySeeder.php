<?php

namespace Database\Seeders;

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
        //

        DB::table('categories')->insert([
            'name' => 'Beverages',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Food',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Medicine',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Cosmetics',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Others',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Fast Food',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Snacks',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Dairy',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Bread',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Fruits',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Vegetables',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Meat',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Fish',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'electornics',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Clothes',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Shoes',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Accessories',
            'created_at' => date('Y-m-d H:i:s'),
        ]);



    }
}
