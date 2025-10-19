<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preferences = [
            [
                'user_id' => 1,
                'notifications' => true,
                'theme' => 'dark',
                'language' => 'en',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => true,
                    'sms_notifications' => false,
                    'newsletter' => true,
                    'marketing_emails' => false,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'notifications' => true,
                'theme' => 'light',
                'language' => 'en',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => true,
                    'sms_notifications' => true,
                    'newsletter' => true,
                    'marketing_emails' => true,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'notifications' => true,
                'theme' => 'auto',
                'language' => 'en',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => false,
                    'sms_notifications' => false,
                    'newsletter' => false,
                    'marketing_emails' => false,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'notifications' => false,
                'theme' => 'light',
                'language' => 'en',
                'additional_preferences' => json_encode([
                    'email_notifications' => false,
                    'push_notifications' => false,
                    'sms_notifications' => false,
                    'newsletter' => false,
                    'marketing_emails' => false,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5,
                'notifications' => true,
                'theme' => 'dark',
                'language' => 'es',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => true,
                    'sms_notifications' => false,
                    'newsletter' => true,
                    'marketing_emails' => false,
                ]),
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(5),
            ],
            [
                'user_id' => 6,
                'notifications' => true,
                'theme' => 'auto',
                'language' => 'en',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => true,
                    'sms_notifications' => true,
                    'newsletter' => true,
                    'marketing_emails' => true,
                ]),
                'created_at' => now()->subDays(15),
                'updated_at' => now(),
            ],
            [
                'user_id' => 7,
                'notifications' => true,
                'theme' => 'light',
                'language' => 'fr',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => false,
                    'sms_notifications' => false,
                    'newsletter' => true,
                    'marketing_emails' => false,
                ]),
                'created_at' => now()->subDays(7),
                'updated_at' => now(),
            ],
            [
                'user_id' => 8,
                'notifications' => true,
                'theme' => 'dark',
                'language' => 'de',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => true,
                    'sms_notifications' => false,
                    'newsletter' => false,
                    'marketing_emails' => false,
                ]),
                'created_at' => now()->subDays(3),
                'updated_at' => now(),
            ],
            [
                'user_id' => 9,
                'notifications' => true,
                'theme' => 'light',
                'language' => 'it',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => true,
                    'sms_notifications' => true,
                    'newsletter' => true,
                    'marketing_emails' => true,
                ]),
                'created_at' => now()->subDays(1),
                'updated_at' => now(),
            ],
            [
                'user_id' => 10,
                'notifications' => true,
                'theme' => 'auto',
                'language' => 'en',
                'additional_preferences' => json_encode([
                    'email_notifications' => true,
                    'push_notifications' => true,
                    'sms_notifications' => false,
                    'newsletter' => true,
                    'marketing_emails' => false,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('user_preferences')->insert($preferences);
    }
}
