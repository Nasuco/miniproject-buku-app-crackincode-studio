<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Penulis',
            'email' => 'penulis@gmail.com',
            'password' => bcrypt('penulis123'),
            'role' => 'penulis',
        ]);

        User::create([
            'name' => 'Penulis2',
            'email' => 'penulis2@gmail.com',
            'password' => bcrypt('penulis123'),
            'role' => 'penulis',
        ]);
    }
}
