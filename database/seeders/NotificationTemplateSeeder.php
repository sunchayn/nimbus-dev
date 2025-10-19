<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Welcome Email',
                'slug' => 'welcome-email',
                'type' => 'email',
                'subject' => 'Welcome to {{site_name}}!',
                'body' => 'Hi {{user_name}},\n\nWelcome to {{site_name}}! We\'re excited to have you on board.\n\nYour account has been successfully created and you can now start exploring our platform.\n\nIf you have any questions, feel free to contact our support team.\n\nBest regards,\nThe {{site_name}} Team',
                'variables' => json_encode(['site_name', 'user_name']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Order Confirmation',
                'slug' => 'order-confirmation',
                'type' => 'email',
                'subject' => 'Order Confirmation - {{order_number}}',
                'body' => 'Hi {{user_name}},\n\nThank you for your order! We\'ve received your order #{{order_number}} and it\'s being processed.\n\nOrder Details:\n{{order_items}}\n\nTotal: ${{order_total}}\n\nWe\'ll send you a tracking number once your order ships.\n\nThank you for choosing {{site_name}}!',
                'variables' => json_encode(['user_name', 'order_number', 'order_items', 'order_total', 'site_name']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Order Shipped',
                'slug' => 'order-shipped',
                'type' => 'email',
                'subject' => 'Your Order Has Shipped - {{order_number}}',
                'body' => 'Hi {{user_name}},\n\nGreat news! Your order #{{order_number}} has been shipped.\n\nTracking Number: {{tracking_number}}\nShipping Method: {{shipping_method}}\n\nYou can track your package using the tracking number above.\n\nThank you for your business!',
                'variables' => json_encode(['user_name', 'order_number', 'tracking_number', 'shipping_method']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Password Reset',
                'slug' => 'password-reset',
                'type' => 'email',
                'subject' => 'Password Reset Request',
                'body' => 'Hi {{user_name}},\n\nYou requested a password reset for your {{site_name}} account.\n\nClick the link below to reset your password:\n{{reset_link}}\n\nThis link will expire in {{expiry_hours}} hours.\n\nIf you didn\'t request this, please ignore this email.\n\nBest regards,\nThe {{site_name}} Team',
                'variables' => json_encode(['user_name', 'site_name', 'reset_link', 'expiry_hours']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Push Notification - New Product',
                'slug' => 'push-new-product',
                'type' => 'push',
                'subject' => 'New Product Alert',
                'body' => 'Check out our latest product: {{product_name}}! Only ${{product_price}}',
                'variables' => json_encode(['product_name', 'product_price']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SMS Order Update',
                'slug' => 'sms-order-update',
                'type' => 'sms',
                'subject' => 'Order Update',
                'body' => 'Your order #{{order_number}} status: {{order_status}}. Track: {{tracking_link}}',
                'variables' => json_encode(['order_number', 'order_status', 'tracking_link']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'In-App Notification',
                'slug' => 'in-app-notification',
                'type' => 'in_app',
                'subject' => 'Account Verification',
                'body' => 'Please verify your email address to access all features.',
                'variables' => json_encode([]),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Newsletter',
                'slug' => 'newsletter',
                'type' => 'email',
                'subject' => 'Weekly Newsletter - {{week_date}}',
                'body' => 'Hi {{user_name}},\n\nHere\'s what\'s new this week:\n\n{{newsletter_content}}\n\nDon\'t miss out on our latest deals and products!\n\nBest regards,\nThe {{site_name}} Team',
                'variables' => json_encode(['user_name', 'week_date', 'newsletter_content', 'site_name']),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('notification_templates')->insert($templates);
    }
}
