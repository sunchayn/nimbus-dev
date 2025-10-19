<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'status' => ['sometimes', Rule::in(['pending', 'processing', 'shipped', 'delivered', 'cancelled'])],
            'shipping_address' => 'sometimes|array',
            'shipping_address.name' => 'required_with:shipping_address|string|max:255',
            'shipping_address.street' => 'required_with:shipping_address|string|max:255',
            'shipping_address.city' => 'required_with:shipping_address|string|max:100',
            'shipping_address.state' => 'required_with:shipping_address|string|max:100',
            'shipping_address.postal_code' => 'required_with:shipping_address|string|max:20',
            'shipping_address.country' => 'required_with:shipping_address|string|size:2',
            'shipping_method' => ['sometimes', Rule::in(['standard', 'express', 'overnight', 'pickup'])],
            'notes' => 'sometimes|string|max:1000',
            'tracking_number' => 'sometimes|string|max:100',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'shipping_address.country.size' => 'Country code must be exactly 2 characters.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'shipping_address.name' => 'shipping name',
            'shipping_address.street' => 'shipping street',
            'shipping_address.city' => 'shipping city',
            'shipping_address.state' => 'shipping state',
            'shipping_address.postal_code' => 'shipping postal code',
            'shipping_address.country' => 'shipping country',
            'shipping_method' => 'shipping method',
            'tracking_number' => 'tracking number',
        ];
    }
}
