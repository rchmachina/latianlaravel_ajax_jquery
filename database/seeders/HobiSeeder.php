<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class HobiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('Hobi')->insert([
            'hobi' => "game"
            ]);
        DB::table('Hobi')->insert([
            'hobi' => "motor"
            ]);
        DB::table('Hobi')->insert([
            'hobi' => "coding"
            ]);


    }
}
