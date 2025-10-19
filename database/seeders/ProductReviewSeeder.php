<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'product_id' => 1,
                'user_id' => 2,
                'rating' => 5,
                'title' => 'Excellent sound quality!',
                'comment' => 'These headphones are amazing! The sound quality is crystal clear and the noise cancellation works perfectly. Battery life is exactly as advertised.',
                'is_verified' => true,
                'is_approved' => true,
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
            [
                'product_id' => 1,
                'user_id' => 3,
                'rating' => 4,
                'title' => 'Great headphones with minor issues',
                'comment' => 'Overall great headphones. Sound quality is excellent and they\'re very comfortable. Only issue is the touch controls can be a bit sensitive.',
                'is_verified' => true,
                'is_approved' => true,
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(8),
            ],
            [
                'product_id' => 2,
                'user_id' => 6,
                'rating' => 5,
                'title' => 'Perfect smartwatch!',
                'comment' => 'This smartwatch has exceeded my expectations. The health monitoring features are accurate and the battery life is impressive. Highly recommended!',
                'is_verified' => true,
                'is_approved' => true,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'product_id' => 3,
                'user_id' => 7,
                'rating' => 4,
                'title' => 'Solid gaming keyboard',
                'comment' => 'Great mechanical keyboard for gaming. The RGB lighting is customizable and the keys have a nice tactile feel. Would recommend for gamers.',
                'is_verified' => true,
                'is_approved' => true,
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'product_id' => 4,
                'user_id' => 8,
                'rating' => 3,
                'title' => 'Decent charging pad',
                'comment' => 'Works well for charging my phone. The LED indicator is helpful. Only complaint is that it gets a bit warm during charging.',
                'is_verified' => true,
                'is_approved' => true,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'product_id' => 6,
                'user_id' => 9,
                'rating' => 5,
                'title' => 'Very comfortable t-shirt',
                'comment' => 'Love this t-shirt! The cotton is soft and comfortable. Perfect fit and the quality is excellent. Will definitely buy more.',
                'is_verified' => true,
                'is_approved' => true,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'product_id' => 7,
                'user_id' => 2,
                'rating' => 4,
                'title' => 'Good office chair',
                'comment' => 'Comfortable chair for long work sessions. The lumbar support is helpful and the mesh back keeps me cool. Assembly was straightforward.',
                'is_verified' => true,
                'is_approved' => true,
                'created_at' => now()->subHours(12),
                'updated_at' => now()->subHours(12),
            ],
            [
                'product_id' => 8,
                'user_id' => 3,
                'rating' => 5,
                'title' => 'Amazing portable speaker',
                'comment' => 'This speaker is perfect for outdoor activities. The sound is clear and loud, and the waterproof feature gives me peace of mind.',
                'is_verified' => true,
                'is_approved' => true,
                'created_at' => now()->subHours(6),
                'updated_at' => now()->subHours(6),
            ],
        ];

        DB::table('product_reviews')->insert($reviews);
    }
}
