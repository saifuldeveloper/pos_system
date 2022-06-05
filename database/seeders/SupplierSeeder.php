<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suppliers')->insert([
            'name' => 'saful',
            'address' => 'Dhaka',
            'mobile' => '0123654125',
            'email' => 'saiful@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('suppliers')->insert([
            'name' => 'sakib',
            'address' => 'Dhaka',
            'mobile' => '0123654125',
            'email' => 'sakib@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('suppliers')->insert([
            'name' => 'rakib',
            'address' => 'mirpur',
            'mobile' => '12548793396',
            'email' => 'rakib@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('suppliers')->insert([
            'name' => 'rony',
            'address' => 'jaydebpur',
            'mobile' => '13548793396',
            'email' => 'rony@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('suppliers')->insert([
            'name' => 'sagor',
            'address' => 'Dinajpur',
            'mobile' => '13548793396',
            'email' => 'sagor@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Dipu',
            'address' => 'Birol',
            'mobile' => '13548793396',
            'email' => 'dipu@gmail.com',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        




    }
}
