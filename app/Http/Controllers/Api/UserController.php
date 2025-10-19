<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUserRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users with pagination and filtering.
     */
    public function index(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'search' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive,pending',
            'role' => 'nullable|in:admin,user,moderator',
            'sort_by' => 'nullable|in:name,email,created_at',
            'sort_direction' => 'nullable|in:asc,desc',
        ]);

        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'email' => 'john@example.com',
                    'status' => 'active',
                    'role' => 'user',
                    'created_at' => '2024-01-15T10:30:00Z',
                ],
                [
                    'id' => 2,
                    'name' => 'Jane Smith',
                    'email' => 'jane@example.com',
                    'status' => 'active',
                    'role' => 'admin',
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

    /**
     * Store a newly created user.
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        return response()->json([
            'message' => 'User created successfully',
            'data' => [
                'id' => 123,
                'name' => $request->validated()['name'],
                'email' => $request->validated()['email'],
                'status' => 'pending',
                'created_at' => now()->toISOString(),
            ],
        ], 201);
    }

    /**
     * Display the specified user.
     */
    public function show(int $user): JsonResponse
    {
        return response()->json([
            'data' => [
                'id' => $user,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'status' => 'active',
                'role' => 'user',
                'profile' => [
                    'bio' => 'Software developer',
                    'avatar' => 'https://example.com/avatar.jpg',
                    'phone' => '+1234567890',
                ],
                'created_at' => '2024-01-15T10:30:00Z',
                'updated_at' => '2024-01-20T14:45:00Z',
            ],
        ]);
    }

    /**
     * Update the specified user.
     */
    public function update(UpdateUserRequest $request, int $user): JsonResponse
    {
        return response()->json([
            'message' => 'User updated successfully',
            'data' => [
                'id' => $user,
                'name' => $request->validated()['name'],
                'email' => $request->validated()['email'],
                'updated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Partially update the specified user.
     */
    public function partialUpdate(Request $request, int $user): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'status' => 'sometimes|in:active,inactive,pending',
            'profile' => 'sometimes|array',
            'profile.bio' => 'sometimes|string|max:1000',
            'profile.phone' => 'sometimes|string|max:20',
        ]);

        return response()->json([
            'message' => 'User partially updated successfully',
            'data' => [
                'id' => $user,
                'updated_fields' => array_keys($validated),
                'updated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Remove the specified user.
     */
    public function destroy(int $user): JsonResponse
    {
        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }

    /**
     * Upload avatar for the specified user.
     */
    public function uploadAvatar(Request $request, int $user): JsonResponse
    {
        $validated = $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,gif|max:2048',
        ]);

        return response()->json([
            'message' => 'Avatar uploaded successfully',
            'data' => [
                'user_id' => $user,
                'avatar_url' => 'https://example.com/avatars/'.$user.'.jpg',
                'uploaded_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Get orders for the specified user.
     */
    public function orders(Request $request, int $user): JsonResponse
    {
        $validated = $request->validate([
            'status' => 'nullable|in:pending,processing,shipped,delivered,cancelled',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date|after_or_equal:date_from',
        ]);

        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'user_id' => $user,
                    'status' => 'delivered',
                    'total' => 99.99,
                    'created_at' => '2024-01-15T10:30:00Z',
                ],
                [
                    'id' => 2,
                    'user_id' => $user,
                    'status' => 'processing',
                    'total' => 149.99,
                    'created_at' => '2024-01-20T14:45:00Z',
                ],
            ],
        ]);
    }

    /**
     * Send notification to the specified user.
     */
    public function sendNotification(Request $request, int $user): JsonResponse
    {
        $validated = $request->validate([
            'type' => 'required|in:email,sms,push',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'priority' => 'nullable|in:low,medium,high,urgent',
        ]);

        return response()->json([
            'message' => 'Notification sent successfully',
            'data' => [
                'user_id' => $user,
                'notification_id' => 456,
                'type' => $validated['type'],
                'sent_at' => now()->toISOString(),
            ],
        ]);
    }
}
