<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Coca Cola',
            'category_id' => 1,
            'supplier_id' => 1,
            'unit_id' => 1,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Fanta',
            'category_id' => 2,
            'supplier_id' => 2,
            'unit_id' => 2,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Sprite',
            'category_id' => 3,
            'supplier_id' => 3,
            'unit_id' => 3,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Pepsi',
            'category_id' => 4,
            'supplier_id' => 4,
            'unit_id' => 4,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Maggi',
            'category_id' => 5,
            'supplier_id' => 5,
            'unit_id' => 5,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Bread',
            'category_id' => 6,
            'supplier_id' => 6,
            'unit_id' => 6,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Milk',
            'category_id' => 7,
            'supplier_id' => 7,
            'unit_id' => 7,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Cheese',
            'category_id' => 8,
            'supplier_id' => 8,
            'unit_id' => 8,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Biscuits',
            'category_id' => 9,
            'supplier_id' => 9,
            'unit_id' => 9,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Chips',
            'category_id' => 10,
            'supplier_id' => 10,
            'unit_id' => 10,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Cake',
            'category_id' => 11,
            'supplier_id' => 11,
            'unit_id' => 11,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Cookie',
            'category_id' => 12,
            'supplier_id' => 12,
            'unit_id' => 12,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Chips',
            'category_id' => 13,
            'supplier_id' => 13,
            'unit_id' => 13,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('products')->insert([
            'name' => 'Cake',
            'category_id' => 14,
            'supplier_id' => 14,
            'unit_id' => 14,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
