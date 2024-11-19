<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DefaultUsersSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Siva',
            'email' => 'sivanagbhavanam@gmail.com',
            'password' => Hash::make('123456'), // Replace with a secure password
            'role' => 'admin', // Add a role field to distinguish admin
        ]);

        // Create Default User
        User::create([
            'name' => 'Siva',
            'email' => 'sivanagbhavanam@gmail.com',
            'password' => Hash::make('654321'), // Replace with a secure password
            'role' => 'user',
        ]);
    }
}

