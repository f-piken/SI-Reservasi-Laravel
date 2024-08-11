<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_user')->insert([
            'Username' => 'Fiky',
            'Email' => 'fiky@gmail.com',
            'Password' => Hash::make('fiky123'),
        ]);
    }
}
