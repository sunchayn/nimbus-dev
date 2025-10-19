<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['user_id' => 1, 'tag' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'tag' => 'technical', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'tag' => 'senior', 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 2, 'tag' => 'marketing', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'tag' => 'tech-savvy', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'tag' => 'early-adopter', 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 3, 'tag' => 'moderator', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'tag' => 'community', 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 4, 'tag' => 'new-user', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'tag' => 'unverified', 'created_at' => now(), 'updated_at' => now()],

            ['user_id' => 5, 'tag' => 'creative', 'created_at' => now()->subDays(30), 'updated_at' => now()->subDays(5)],
            ['user_id' => 5, 'tag' => 'freelancer', 'created_at' => now()->subDays(30), 'updated_at' => now()->subDays(5)],
            ['user_id' => 5, 'tag' => 'inactive', 'created_at' => now()->subDays(30), 'updated_at' => now()->subDays(5)],

            ['user_id' => 6, 'tag' => 'developer', 'created_at' => now()->subDays(15), 'updated_at' => now()],
            ['user_id' => 6, 'tag' => 'tech-enthusiast', 'created_at' => now()->subDays(15), 'updated_at' => now()],
            ['user_id' => 6, 'tag' => 'active', 'created_at' => now()->subDays(15), 'updated_at' => now()],

            ['user_id' => 7, 'tag' => 'analyst', 'created_at' => now()->subDays(7), 'updated_at' => now()],
            ['user_id' => 7, 'tag' => 'data-driven', 'created_at' => now()->subDays(7), 'updated_at' => now()],

            ['user_id' => 8, 'tag' => 'designer', 'created_at' => now()->subDays(3), 'updated_at' => now()],
            ['user_id' => 8, 'tag' => 'creative', 'created_at' => now()->subDays(3), 'updated_at' => now()],

            ['user_id' => 9, 'tag' => 'marketing', 'created_at' => now()->subDays(1), 'updated_at' => now()],
            ['user_id' => 9, 'tag' => 'social-media', 'created_at' => now()->subDays(1), 'updated_at' => now()],

            ['user_id' => 10, 'tag' => 'customer-service', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 10, 'tag' => 'team-lead', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('user_tags')->insert($tags);
    }
}
