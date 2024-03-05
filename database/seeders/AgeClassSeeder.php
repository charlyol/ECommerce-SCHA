<?php

namespace Database\Seeders;

use App\Models\AgeClass;
use Illuminate\Database\Seeder;

class AgeClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AgeClass::factory()
            ->count(7)
            ->create();
    }
}
