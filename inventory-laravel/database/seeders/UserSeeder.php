<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => 'admin123',
        ]);

        User::factory()->create([
            'name' => 'Staff Gudang',
            'email' => 'staff@example.com',
            'password' => 'staff123',
        ]);
    }
}
