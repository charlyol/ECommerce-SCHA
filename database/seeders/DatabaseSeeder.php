<?php

namespace Database\Seeders;



use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ImageSeeder::class,
            RoleSeeder::class,
            SagaSeeder::class,
            UserSeeder::class,
            AdressSeeder::class,
        ]);

    }
}



