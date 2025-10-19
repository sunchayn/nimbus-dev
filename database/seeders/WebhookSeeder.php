<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebhookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $webhooks = [
            [
                'name' => 'Payment Gateway Webhook',
                'url' => 'https://api.paymentgateway.com/webhooks/orders',
                'event_type' => 'payment',
                'events' => json_encode(['payment.completed', 'payment.failed', 'payment.refunded']),
                'secret' => 'whsec_1234567890abcdef',
                'is_active' => true,
                'retry_count' => 3,
                'timeout' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shipping Provider Webhook',
                'url' => 'https://api.shippingprovider.com/webhooks/tracking',
                'event_type' => 'shipping',
                'events' => json_encode(['shipment.created', 'shipment.in_transit', 'shipment.delivered']),
                'secret' => 'whsec_abcdef1234567890',
                'is_active' => true,
                'retry_count' => 5,
                'timeout' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inventory Management Webhook',
                'url' => 'https://api.inventory.com/webhooks/stock',
                'event_type' => 'inventory',
                'events' => json_encode(['stock.low', 'stock.out', 'stock.restocked']),
                'secret' => 'whsec_9876543210fedcba',
                'is_active' => true,
                'retry_count' => 3,
                'timeout' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Management Webhook',
                'url' => 'https://api.usermanagement.com/webhooks/users',
                'event_type' => 'user',
                'events' => json_encode(['user.created', 'user.updated', 'user.deleted']),
                'secret' => 'whsec_fedcba0987654321',
                'is_active' => true,
                'retry_count' => 3,
                'timeout' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Order Processing Webhook',
                'url' => 'https://api.orderprocessing.com/webhooks/orders',
                'event_type' => 'order',
                'events' => json_encode(['order.created', 'order.updated', 'order.cancelled']),
                'secret' => 'whsec_1122334455667788',
                'is_active' => true,
                'retry_count' => 3,
                'timeout' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Analytics Webhook',
                'url' => 'https://api.analytics.com/webhooks/events',
                'event_type' => 'user',
                'events' => json_encode(['user.login', 'user.logout', 'user.action']),
                'secret' => 'whsec_9988776655443322',
                'is_active' => false,
                'retry_count' => 2,
                'timeout' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('webhooks')->insert($webhooks);

        $webhookLogs = [
            [
                'webhook_id' => 1,
                'event_type' => 'payment.completed',
                'payload' => json_encode([
                    'order_id' => 1,
                    'payment_id' => 'pay_123456789',
                    'amount' => 219.99,
                    'currency' => 'USD',
                    'status' => 'completed',
                ]),
                'status' => 'success',
                'response_code' => 200,
                'response_body' => '{"status": "received", "id": "webhook_123"}',
                'error_message' => null,
                'attempt_count' => 1,
                'processed_at' => now()->subDays(1),
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'webhook_id' => 2,
                'event_type' => 'shipment.delivered',
                'payload' => json_encode([
                    'order_id' => 1,
                    'tracking_number' => 'TRK123456789',
                    'status' => 'delivered',
                    'delivered_at' => now()->subDays(1)->toISOString(),
                ]),
                'status' => 'success',
                'response_code' => 200,
                'response_body' => '{"status": "received", "id": "webhook_456"}',
                'error_message' => null,
                'attempt_count' => 1,
                'processed_at' => now()->subDays(1),
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'webhook_id' => 3,
                'event_type' => 'stock.low',
                'payload' => json_encode([
                    'product_id' => 1,
                    'current_stock' => 5,
                    'threshold' => 10,
                    'product_name' => 'Wireless Bluetooth Headphones',
                ]),
                'status' => 'failed',
                'response_code' => 500,
                'response_body' => '{"error": "Internal server error"}',
                'error_message' => 'Connection timeout after 30 seconds',
                'attempt_count' => 3,
                'processed_at' => null,
                'created_at' => now()->subHours(2),
                'updated_at' => now()->subHours(1),
            ],
            [
                'webhook_id' => 4,
                'event_type' => 'user.created',
                'payload' => json_encode([
                    'user_id' => 10,
                    'email' => 'maria.martinez@example.com',
                    'name' => 'Maria Martinez',
                    'created_at' => now()->toISOString(),
                ]),
                'status' => 'success',
                'response_code' => 201,
                'response_body' => '{"status": "created", "id": "user_webhook_789"}',
                'error_message' => null,
                'attempt_count' => 1,
                'processed_at' => now()->subMinutes(30),
                'created_at' => now()->subMinutes(30),
                'updated_at' => now()->subMinutes(30),
            ],
        ];

        DB::table('webhook_logs')->insert($webhookLogs);
    }
}
