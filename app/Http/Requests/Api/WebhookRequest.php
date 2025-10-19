<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class WebhookRequest extends FormRequest
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
            'webhook_id' => 'required|string|max:255',
            'event_type' => 'required|string|max:100',
            'timestamp' => 'required|date',
            'data' => 'required|array',
            'data.order_id' => 'nullable|integer',
            'data.payment_id' => 'nullable|string|max:255',
            'data.status' => 'nullable|string|max:50',
            'data.amount' => 'nullable|numeric|min:0',
            'data.currency' => 'nullable|string|size:3',
            'signature' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'webhook_id.required' => 'Webhook ID is required.',
            'event_type.required' => 'Event type is required.',
            'timestamp.required' => 'Timestamp is required.',
            'data.required' => 'Webhook data is required.',
            'data.amount.min' => 'Amount cannot be negative.',
            'data.currency.size' => 'Currency code must be exactly 3 characters.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'webhook_id' => 'webhook ID',
            'event_type' => 'event type',
            'data.order_id' => 'order ID',
            'data.payment_id' => 'payment ID',
            'data.amount' => 'amount',
            'data.currency' => 'currency',
        ];
    }
}
