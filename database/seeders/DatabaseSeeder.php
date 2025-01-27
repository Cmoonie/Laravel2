<?php

namespace Database\Seeders;

use App\Models\ttg;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Cecilia',
//            'email' => 'cece@cecilia.com',
//            'password' => 'Gloria',
//        ]);
//User::factory(10)
////        ->count(10)
//        ->create();

ttg::factory(10)
        ->create();
    }
