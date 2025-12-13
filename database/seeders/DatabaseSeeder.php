<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'image' => '\Profiles\PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqr6j7JdJ.png',
            'name' => 'OsamaGenius',
            'email' => 'OsamaGenius@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Admin@10'),
            'remember_token' => Str::random(10),
            'created_at' => '2025-10-1 12:54:01',
            'updated_at' => '2025-10-1 12:54:01',
        ]);
    }
}
