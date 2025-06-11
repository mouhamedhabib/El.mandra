<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'user_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'name' => 'Vendor',
                'user_name' => 'vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'vendor',
                'status' => 'active',
            ],
            [
                'name' => 'User',
                'user_name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'status' => 'active',
            ],
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']], 
                $userData
            );
        }
    }
}
