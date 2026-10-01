<?php

namespace Database\Seeders;

use App\Models\ttg;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        ttg::factory(10)
            ->create();
    }
}
