<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            [
                'user_id' => 1,
                'bio' => 'System administrator with 10+ years of experience in web development and server management.',
                'phone' => '+1-555-0101',
                'date_of_birth' => '1985-03-15',
                'gender' => 'male',
                'avatar' => 'https://example.com/avatars/admin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'bio' => 'Digital marketing specialist passionate about technology and innovation.',
                'phone' => '+1-555-0102',
                'date_of_birth' => '1990-07-22',
                'gender' => 'female',
                'avatar' => 'https://example.com/avatars/jane.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'bio' => 'Content moderator ensuring community guidelines are followed.',
                'phone' => '+1-555-0103',
                'date_of_birth' => '1988-11-08',
                'gender' => 'male',
                'avatar' => 'https://example.com/avatars/mike.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'bio' => null,
                'phone' => '+1-555-0104',
                'date_of_birth' => '1995-01-30',
                'gender' => 'female',
                'avatar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'bio' => 'Freelance designer and photographer.',
                'phone' => '+1-555-0105',
                'date_of_birth' => '1992-05-14',
                'gender' => 'male',
                'avatar' => 'https://example.com/avatars/david.jpg',
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(5),
            ],
            [
                'user_id' => 6,
                'bio' => 'Software engineer and tech enthusiast.',
                'phone' => '+1-555-0106',
                'date_of_birth' => '1993-09-18',
                'gender' => 'female',
                'avatar' => 'https://example.com/avatars/emily.jpg',
                'created_at' => now()->subDays(15),
                'updated_at' => now(),
            ],
            [
                'user_id' => 7,
                'bio' => 'Business analyst with a passion for data and analytics.',
                'phone' => '+1-555-0107',
                'date_of_birth' => '1987-12-03',
                'gender' => 'male',
                'avatar' => 'https://example.com/avatars/robert.jpg',
                'created_at' => now()->subDays(7),
                'updated_at' => now(),
            ],
            [
                'user_id' => 8,
                'bio' => 'Graphic designer and creative professional.',
                'phone' => '+1-555-0108',
                'date_of_birth' => '1991-04-25',
                'gender' => 'female',
                'avatar' => 'https://example.com/avatars/lisa.jpg',
                'created_at' => now()->subDays(3),
                'updated_at' => now(),
            ],
            [
                'user_id' => 9,
                'bio' => 'Marketing coordinator and social media manager.',
                'phone' => '+1-555-0109',
                'date_of_birth' => '1994-08-12',
                'gender' => 'male',
                'avatar' => 'https://example.com/avatars/james.jpg',
                'created_at' => now()->subDays(1),
                'updated_at' => now(),
            ],
            [
                'user_id' => 10,
                'bio' => 'Customer service representative and team lead.',
                'phone' => '+1-555-0110',
                'date_of_birth' => '1989-06-28',
                'gender' => 'female',
                'avatar' => 'https://example.com/avatars/maria.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('user_profiles')->insert($profiles);
    }
}
