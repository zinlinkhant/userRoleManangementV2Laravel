<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('admin_users')->insert([
            [
                'name' => 'Admin User 1',
                'username' => 'admin1',
                'email' => 'admin1@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Admin User 2',
                'username' => 'admin2',
                'email' => 'admin2@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Admin User 3',
                'username' => 'admin3',
                'email' => 'admin3@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Admin User 4',
                'username' => 'admin4',
                'email' => 'admin4@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Admin User 5',
                'username' => 'admin5',
                'email' => 'admin5@example.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
