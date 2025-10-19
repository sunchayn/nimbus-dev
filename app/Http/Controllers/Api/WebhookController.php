<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WebhookRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    /**
     * Payment webhook.
     */
    public function payment(WebhookRequest $request): JsonResponse
    {
        return response()->json([
            'message' => 'Payment webhook processed successfully',
            'data' => [
                'webhook_id' => $request->validated()['webhook_id'],
                'event_type' => $request->validated()['event_type'],
                'order_id' => $request->validated()['data']['order_id'] ?? null,
                'payment_id' => $request->validated()['data']['payment_id'] ?? null,
                'status' => $request->validated()['data']['status'] ?? null,
                'processed_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Shipping webhook.
     */
    public function shipping(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'webhook_id' => 'required|string|max:255',
            'event_type' => 'required|string|max:100',
            'data' => 'required|array',
            'data.order_id' => 'required|integer',
            'data.tracking_number' => 'required|string|max:100',
            'data.status' => 'required|string|max:50',
            'data.location' => 'nullable|string|max:255',
            'data.estimated_delivery' => 'nullable|date',
        ]);

        return response()->json([
            'message' => 'Shipping webhook processed successfully',
            'data' => [
                'webhook_id' => $validated['webhook_id'],
                'event_type' => $validated['event_type'],
                'order_id' => $validated['data']['order_id'],
                'tracking_number' => $validated['data']['tracking_number'],
                'status' => $validated['data']['status'],
                'processed_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Inventory webhook.
     */
    public function inventory(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'webhook_id' => 'required|string|max:255',
            'event_type' => 'required|string|max:100',
            'data' => 'required|array',
            'data.product_id' => 'required|integer',
            'data.quantity_change' => 'required|integer',
            'data.new_quantity' => 'required|integer|min:0',
            'data.reason' => 'nullable|string|max:255',
        ]);

        return response()->json([
            'message' => 'Inventory webhook processed successfully',
            'data' => [
                'webhook_id' => $validated['webhook_id'],
                'event_type' => $validated['event_type'],
                'product_id' => $validated['data']['product_id'],
                'quantity_change' => $validated['data']['quantity_change'],
                'new_quantity' => $validated['data']['new_quantity'],
                'processed_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Get webhook logs.
     */
    public function logs(Request $request, string $webhook): JsonResponse
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'status' => 'nullable|in:success,failed,pending',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
        ]);

        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'webhook_id' => $webhook,
                    'event_type' => 'payment.completed',
                    'status' => 'success',
                    'response_code' => 200,
                    'processed_at' => '2024-01-15T10:30:00Z',
                    'created_at' => '2024-01-15T10:30:00Z',
                ],
                [
                    'id' => 2,
                    'webhook_id' => $webhook,
                    'event_type' => 'payment.failed',
                    'status' => 'failed',
                    'response_code' => 422,
                    'processed_at' => '2024-01-14T09:15:00Z',
                    'created_at' => '2024-01-14T09:15:00Z',
                ],
            ],
            'meta' => [
                'current_page' => $validated['page'] ?? 1,
                'per_page' => $validated['per_page'] ?? 15,
                'total' => 2,
                'last_page' => 1,
            ],
        ]);
    }
}
