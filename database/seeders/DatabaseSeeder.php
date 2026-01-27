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
            UserSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            WebhookSeeder::class,
            ProductReviewSeeder::class,
            UserProfileSeeder::class,
            UserAddressSeeder::class,
            UserPreferenceSeeder::class,
            UserTagSeeder::class,
            ProductImageSeeder::class,
        ]);
    }
}
