<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreProductRequest;
use App\Http\Requests\Api\UpdateProductRequest;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of products with search and filtering.
     */
    public function index(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:100',
            'search' => 'nullable|string|max:255',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0|gte:min_price',
            'status' => 'nullable|in:active,inactive,discontinued',
            'sort_by' => 'nullable|in:name,price,created_at,popularity',
            'sort_direction' => 'nullable|in:asc,desc',
        ]);

        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'name' => 'Wireless Headphones',
                    'description' => 'High-quality wireless headphones with noise cancellation',
                    'price' => 199.99,
                    'category_id' => 1,
                    'status' => 'active',
                    'stock_quantity' => 50,
                    'created_at' => '2024-01-15T10:30:00Z',
                ],
                [
                    'id' => 2,
                    'name' => 'Smart Watch',
                    'description' => 'Feature-rich smartwatch with health monitoring',
                    'price' => 299.99,
                    'category_id' => 2,
                    'status' => 'active',
                    'stock_quantity' => 25,
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
     * Store a newly created product.
     */
    public function store(StoreProductRequest $request, EncryptCookies $encryptCookiesMiddleare): JsonResponse
    {
        Cookie::queue('::example::', Str::uuid());
        Cookie::queue('appearance', 'light');

        return response()
            ->json([
                'message' => 'Product created successfully',
                'data' => [
                    'id' => 123,
                    'name' => $request->validated()['name'],
                    'description' => $request->validated()['description'],
                    'price' => $request->validated()['price'],
                    'category_id' => $request->validated()['category_id'],
                    'status' => 'active',
                    'created_at' => now()->toISOString(),
                ],
            ], 201);
    }

    /**
     * Display the specified product.
     */
    public function show(int $product): JsonResponse
    {
        return response()->json([
            'data' => [
                'id' => $product,
                'name' => 'Wireless Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation',
                'price' => 199.99,
                'category_id' => 1,
                'status' => 'active',
                'stock_quantity' => 50,
                'images' => [
                    'https://example.com/images/product1-1.jpg',
                    'https://example.com/images/product1-2.jpg',
                ],
                'specifications' => [
                    'battery_life' => '30 hours',
                    'connectivity' => 'Bluetooth 5.0',
                    'weight' => '250g',
                ],
                'created_at' => '2024-01-15T10:30:00Z',
                'updated_at' => '2024-01-20T14:45:00Z',
            ],
        ]);
    }

    /**
     * Update the specified product.
     */
    public function update(UpdateProductRequest $request, int $product): JsonResponse
    {
        return response()->json([
            'message' => 'Product updated successfully',
            'data' => [
                'id' => $product,
                'name' => $request->validated()['name'],
                'description' => $request->validated()['description'],
                'price' => $request->validated()['price'],
                'updated_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Remove the specified product.
     */
    public function destroy(int $product): JsonResponse
    {
        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }

    /**
     * Upload images for the specified product.
     */
    public function uploadImages(Request $request, int $product): JsonResponse
    {
        $validated = $request->validate([
            'images' => 'required|array|min:1|max:5',
            'images.*' => 'image|mimes:jpeg,png,gif|max:2048',
            'primary_image' => 'nullable|integer|min:0|max:4',
        ]);

        return response()->json([
            'message' => 'Images uploaded successfully',
            'data' => [
                'product_id' => $product,
                'uploaded_images' => count($validated['images']),
                'image_urls' => [
                    'https://example.com/images/product'.$product.'-1.jpg',
                    'https://example.com/images/product'.$product.'-2.jpg',
                ],
                'uploaded_at' => now()->toISOString(),
            ],
        ]);
    }

    /**
     * Get reviews for the specified product.
     */
    public function reviews(Request $request, int $product): JsonResponse
    {
        $validated = $request->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1|max:50',
            'rating' => 'nullable|integer|min:1|max:5',
            'sort_by' => 'nullable|in:newest,oldest,rating_high,rating_low',
        ]);

        return response()->json([
            'data' => [
                [
                    'id' => 1,
                    'product_id' => $product,
                    'user_id' => 1,
                    'rating' => 5,
                    'title' => 'Excellent product!',
                    'comment' => 'Great sound quality and comfortable to wear.',
                    'created_at' => '2024-01-15T10:30:00Z',
                ],
                [
                    'id' => 2,
                    'product_id' => $product,
                    'user_id' => 2,
                    'rating' => 4,
                    'title' => 'Very good',
                    'comment' => 'Good value for money.',
                    'created_at' => '2024-01-14T09:15:00Z',
                ],
            ],
            'meta' => [
                'current_page' => $validated['page'] ?? 1,
                'per_page' => $validated['per_page'] ?? 10,
                'total' => 2,
                'last_page' => 1,
            ],
        ]);
    }

    /**
     * Add a review for the specified product.
     */
    public function addReview(Request $request, int $product): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        return response()->json([
            'message' => 'Review added successfully',
            'data' => [
                'id' => 789,
                'product_id' => $product,
                'user_id' => $validated['user_id'],
                'rating' => $validated['rating'],
                'title' => $validated['title'],
                'comment' => $validated['comment'],
                'created_at' => now()->toISOString(),
            ],
        ], 201);
    }
}
