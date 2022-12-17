<?php

namespace Database\Seeders;

use Brick\Math\BigInteger;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Hasbiel",
            'email' => 'hasbiel@gmail.com',
            'password' => Hash::make('12345'),
            'no_hp'=>"084812414",
            'Kelamin'=>"Pria",
            'username'=>"rch",
            'hobi' =>"basket, bola, game"


        ]);
        DB::table('users')->insert([
            'name' => "Hahahaman",
            'email' => 'hahahagirl@gmail.com',
            'password' => Hash::make('12345'),
            'no_hp'=>   123131,
            'Kelamin'=>"Pria",
            'username'=>"hamen",
            'hobi' =>"basket, bola, game"
           


        ]);
        DB::table('users')->insert([
            'name' => "Hahahagirl",
            'email' => 'hahahaman@gmail.com',
            'password' => Hash::make('1234414125'),
            'no_hp'=>"123131",
            'Kelamin'=>"Pria",
            'username'=>"hagerl",
            'hobi' =>"basket, bola, game",
           


        ]);
    
    }
}
