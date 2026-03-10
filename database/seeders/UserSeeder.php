<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@dearself.com',
            'password' => Hash::make('password123')
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@dearself.com',
            'password' => Hash::make('user123')
        ]);
    }
}