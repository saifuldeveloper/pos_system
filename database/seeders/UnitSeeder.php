<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Db::table('units')->insert([
            'name' => 'kg',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'g',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'l',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'ml',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'packet',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'piece',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'box',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'bottle',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'can',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        Db::table('units')->insert([
            'name' => 'pack',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
