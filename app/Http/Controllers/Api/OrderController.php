<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Http\Requests\Api\UpdateOrderRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of orders with complex filtering.
     */
    public function index(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'user_id' => 'nullable|integer|exists:users,id',
            'status' => 'nullable|in:pending,processing,shipped,delivered,cancelled',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
            'min_total' => 'nullable|numeric|min:0',
            'max_total' => 'nullable|numeric|min:0|gte:min_total',
            'payment_method' => 'nullable|in:credit_card,debit_card,paypal,bank_transfer,cash_on_delivery',
            'sort_by' => 'nullable|in:created_at,total,status',
            'sort_direction' => 'nullable|in:asc,desc',
        ]);

        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'user_id' => 1,
                    'status' => 'delivered',
                    'total' => 299.98,
                    'payment_method' => 'credit_card',
                    'shipping_method' => 'standard',
                    'created_at' => '2024-01-15T10:30:00Z',
                    'delivered_at' => '2024-01-18T14:20:00Z',
                ],
                [
                    'id' => 2,
                    'user_id' => 2,
                    'status' => 'processing',
                    'total' => 149.99,
                    'payment_method' => 'paypal',
                    'shipping_method' => 'express',
                    'created_at' => '2024-01-20T09:15:00Z',
                    'delivered_at' => null,
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

    /**
     * Store a newly created order.
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        Cookie::queue('::example::', Str::uuid());
        Cookie::queue('appearance', 'light');

        return response()->json([
            'message' => 'Order created successfully',
            'data' => [
                'id' => 123,
                'user_id' => $request->validated()['user_id'],
                'status' => 'pending',
                'total' => 299.98,
                'items_count' => count($request->validated()['items']),
                'created_at' => now()->toISOString(),
            ],
        ], 201);
    }

    /**
     * Display the specified order.
     */
    public function show(int $order): JsonResponse
    {
        return response()->json([
            'data' => [
                'id' => $order,
                'user_id' => 1,
                'status' => 'delivered',
                'total' => 299.98,
                'subtotal' => 279.98,
                'tax' => 20.00,
                'shipping' => 0.00,
                'items' => [
                    [
                        'product_id' => 1,
                        'name' => 'Wireless Headphones',
                        'quantity' => 1,
                        'price' => 199.99,
                    ],
                    [
                        'product_id' => 2,
                        'name' => 'Smart Watch',
                        'quantity' => 1,
                        'price' => 99.99,
                    ],
                ],
                'shipping_address' => [
                    'name' => 'John Doe',
                    'street' => '123 Main St',
                    'city' => 'New York',
                    'state' => 'NY',
                    'postal_code' => '10001',
                    'country' => 'US',
                ],
                'payment_method' => 'credit_card',
                'shipping_method' => 'standard',
                'created_at' => '2024-01-15T10:30:00Z',
                'updated_at' => '2024-01-18T14:20:00Z',
            ],
        ]);
    }

    /**
     * Update the specified order.
     */
    public function update(UpdateOrderRequest $request, int $order): JsonResponse
    {
        return response()->json([
            'message' => 'Order updated successfully',
            'data' => [
                'id' => $order,
                'status' => $request->validated()['status'] ?? 'pending',
                'updated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Update the order status.
     */
    public function updateStatus(Request $request, int $order): JsonResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'notes' => 'nullable|string|max:500',
            'tracking_number' => 'nullable|string|max:100',
        ]);

        return response()->json([
            'message' => 'Order status updated successfully',
            'data' => [
                'id' => $order,
                'status' => $validated['status'],
                'tracking_number' => $validated['tracking_number'] ?? null,
                'updated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Cancel the specified order.
     */
    public function cancel(Request $request, int $order): JsonResponse
    {
        $validated = $request->validate([
            'reason' => 'nullable|string|max:500',
        ]);

        DB::table('orders')->where('id', $order)->delete();

        return response()->json([
            'message' => 'Order cancelled successfully',
            'data' => [
                'id' => $order,
                'status' => 'cancelled',
                'cancellation_reason' => $validated['reason'] ?? null,
                'cancelled_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Add items to the specified order.
     */
    public function addItems(Request $request, int $order): JsonResponse
    {
        $validated = $request->validate([
            'items' => 'required|array|min:1|max:10',
            'items.*.product_id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1|max:99',
            'items.*.price' => 'required|numeric|min:0|max:999999.99',
        ]);

        return response()->json([
            'message' => 'Items added to order successfully',
            'data' => [
                'order_id' => $order,
                'added_items' => count($validated['items']),
                'updated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Remove item from the specified order.
     */
    public function removeItem(Request $request, int $order, int $item): JsonResponse
    {
        return response()->json([
            'message' => 'Item removed from order successfully',
            'data' => [
                'order_id' => $order,
                'removed_item_id' => $item,
                'updated_at' => now()->toISOString(),
            ],
        ]);
    }
}
