<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            'name' => 'John Doe',
            'email'=>'johondone@gmail.com',
            'mobile'=>'0123456789',
            'address'=>'Dhaka', 
            'created_at' => date('Y-m-d H:i:s'),
        
        ]);
        DB::table('customers')->insert([
            'name' => 'imran',
            'email'=>'imran@gmail.com',
            'mobile'=>'63456345656',
            'address'=>'mirpur', 
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('customers')->insert([
            'name' => 'sohel',
            'email'=>'sohel@gmail.com',
            'mobile'=>'12545855555',
            'address'=>'sylhet',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('customers')->insert([
            'name' => 'jubair',
            'email'=>'jubair@gmail.com',
            'mobile'=>'12545855555',
            'address'=>'barisal',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('customers')->insert([
            'name' => 'lalit',
            'email'=>'lalit@gmail.com',
            'mobile'=>'089856788998',
            'address'=>'khulna',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

      


    }
}
