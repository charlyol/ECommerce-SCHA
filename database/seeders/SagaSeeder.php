<?php

namespace Database\Seeders;

use App\Models\Saga;
use Illuminate\Database\Seeder;

class SagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Saga::factory()
            ->count(7)
            ->create();
    }
}
