<?php

namespace Database\Seeders;



use App\Models\AgeClass;
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
            AddressSeeder::class,
            AgeClassSeeder::class,
            BookSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            PaymentMethodSeeder::class,
            CommentSeeder::class,
        ]);

    }
}



