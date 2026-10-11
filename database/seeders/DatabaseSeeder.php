<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Petugas Admin',
            'email' => 'admin@pajak.test',
            'password' => bcrypt('password123'),
        ]);
        $admin->forceFill(['role' => 'admin'])->save();

        $this->call(HotelSeeder::class);
    }
}
