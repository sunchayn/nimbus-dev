<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Electronic devices and gadgets',
                'parent_id' => null,
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'Electronics Store - Latest Gadgets',
                'meta_description' => 'Shop the latest electronics and gadgets at our store',
                'meta_keywords' => 'electronics, gadgets, devices, technology',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Audio',
                'slug' => 'audio',
                'description' => 'Audio equipment and accessories',
                'parent_id' => 1,
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'Audio Equipment - Headphones & Speakers',
                'meta_description' => 'High-quality audio equipment and accessories',
                'meta_keywords' => 'audio, headphones, speakers, sound',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Computers',
                'slug' => 'computers',
                'description' => 'Computers, laptops, and accessories',
                'parent_id' => 1,
                'is_active' => true,
                'sort_order' => 2,
                'meta_title' => 'Computers & Laptops - Tech Store',
                'meta_description' => 'Latest computers, laptops and tech accessories',
                'meta_keywords' => 'computers, laptops, tech, accessories',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartphones',
                'slug' => 'smartphones',
                'description' => 'Mobile phones and accessories',
                'parent_id' => 1,
                'is_active' => true,
                'sort_order' => 3,
                'meta_title' => 'Smartphones - Latest Mobile Phones',
                'meta_description' => 'Latest smartphones and mobile accessories',
                'meta_keywords' => 'smartphones, mobile, phones, accessories',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Clothing',
                'slug' => 'clothing',
                'description' => 'Fashion and apparel',
                'parent_id' => null,
                'is_active' => true,
                'sort_order' => 2,
                'meta_title' => 'Fashion Store - Latest Clothing',
                'meta_description' => 'Trendy clothing and fashion accessories',
                'meta_keywords' => 'clothing, fashion, apparel, style',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Men\'s Clothing',
                'slug' => 'mens-clothing',
                'description' => 'Men\'s fashion and apparel',
                'parent_id' => 5,
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'Men\'s Fashion - Latest Styles',
                'meta_description' => 'Trendy men\'s clothing and accessories',
                'meta_keywords' => 'mens clothing, fashion, menswear',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women\'s Clothing',
                'slug' => 'womens-clothing',
                'description' => 'Women\'s fashion and apparel',
                'parent_id' => 5,
                'is_active' => true,
                'sort_order' => 2,
                'meta_title' => 'Women\'s Fashion - Latest Styles',
                'meta_description' => 'Trendy women\'s clothing and accessories',
                'meta_keywords' => 'womens clothing, fashion, womenswear',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home & Garden',
                'slug' => 'home-garden',
                'description' => 'Home improvement and garden supplies',
                'parent_id' => null,
                'is_active' => true,
                'sort_order' => 3,
                'meta_title' => 'Home & Garden - Improvement Supplies',
                'meta_description' => 'Everything for your home and garden',
                'meta_keywords' => 'home, garden, improvement, supplies',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Furniture',
                'slug' => 'furniture',
                'description' => 'Home and office furniture',
                'parent_id' => 8,
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'Furniture Store - Home & Office',
                'meta_description' => 'Quality furniture for home and office',
                'meta_keywords' => 'furniture, home, office, decor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Books',
                'slug' => 'books',
                'description' => 'Books and educational materials',
                'parent_id' => null,
                'is_active' => true,
                'sort_order' => 4,
                'meta_title' => 'Bookstore - Latest Books',
                'meta_description' => 'Wide selection of books and educational materials',
                'meta_keywords' => 'books, education, reading, literature',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
