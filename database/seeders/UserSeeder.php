<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 15; $i++) {
            DB::table('users')->insert([
                'name' => 'mazhar' . $i,
                'email' => 'mazhar' . $i . '@gmail.com',
                'password' => Hash::make('aaaaaaaaa'),
            ]);
        }
        DB::table('users')->insert([
            'name' => 'mazhar15',
            'email' => 'mazhar15@gmail.com',
            'password' => Hash::make('aaaaaaaaa'),
            'role_id'     => 1,
        ]);
    }
}
