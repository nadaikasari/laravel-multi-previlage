<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            [
                'name'      => 'Admin', 
                'email'     => 'admin@gmail.com',
                'username'  => 'admin',
                'password'  => Hash::make('admin123'),
                'role_id'   => 1
            ], [
                'name'      => 'user', 
                'email'     => 'user@gmail.com',
                'username'  => 'user',
                'password'  => Hash::make('user123'),
                'role_id'   => 2
            ]
        ]);
    }
}
