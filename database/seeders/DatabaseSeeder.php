<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create([
            'name' => 'Cecilia',
            'email' => 'Cecilia@windesheim.nl',
            'email_verified_at' => now(),
            'is_admin' => true,
            'password' => Hash::make('Cecilia'),
        ]);
    }
}
