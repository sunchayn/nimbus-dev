<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            [
                'user_id' => 2,
                'name' => 'Jane Smith',
                'street' => '123 Main Street',
                'city' => 'New York',
                'state' => 'NY',
                'postal_code' => '10001',
                'country' => 'US',
                'type' => 'both',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'name' => 'Jane Smith',
                'street' => '456 Business Ave',
                'city' => 'New York',
                'state' => 'NY',
                'postal_code' => '10002',
                'country' => 'US',
                'type' => 'billing',
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'name' => 'Mike Johnson',
                'street' => '789 Oak Avenue',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'postal_code' => '90210',
                'country' => 'US',
                'type' => 'both',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6,
                'name' => 'Emily Davis',
                'street' => '321 Pine Street',
                'city' => 'Chicago',
                'state' => 'IL',
                'postal_code' => '60601',
                'country' => 'US',
                'type' => 'both',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 7,
                'name' => 'Robert Miller',
                'street' => '654 Elm Street',
                'city' => 'Houston',
                'state' => 'TX',
                'postal_code' => '77001',
                'country' => 'US',
                'type' => 'both',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 8,
                'name' => 'Lisa Garcia',
                'street' => '987 Maple Drive',
                'city' => 'Phoenix',
                'state' => 'AZ',
                'postal_code' => '85001',
                'country' => 'US',
                'type' => 'both',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 9,
                'name' => 'James Rodriguez',
                'street' => '147 Cedar Lane',
                'city' => 'Philadelphia',
                'state' => 'PA',
                'postal_code' => '19101',
                'country' => 'US',
                'type' => 'both',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 10,
                'name' => 'Maria Martinez',
                'street' => '258 Birch Road',
                'city' => 'San Antonio',
                'state' => 'TX',
                'postal_code' => '78201',
                'country' => 'US',
                'type' => 'both',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('user_addresses')->insert($addresses);
    }
}
