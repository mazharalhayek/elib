<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 25; $i++) {
            DB::table('books')->insert([
                'name' => 'book' . $i,
                'price' => rand(100,1000),
                'desc' => 'this description of book '.$i.' is just for testing ',
                'author'=>'author '. $i,
            ]);
        }
    }
}
