<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Mahasiswa 1',
            'email' => 'mahasiswa1@example.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa'
        ]);

        User::create([
            'name' => 'Mahasiswa 2',
            'email' => 'mahasiswa2@example.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa'
        ]);

        User::factory(5)->create();
    }
}
