<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        for($i = 0; $i < 10; $i ++){
             DB::table('customers')->insert([
                'name' => Str::random(10),
                'email' => Str::random(15).'@gmail.com',
                'address' => Str::random(20),
                    
            ]);
        }
    }  
}
