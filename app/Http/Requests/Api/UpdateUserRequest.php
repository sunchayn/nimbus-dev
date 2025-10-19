<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user');

        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,'.$userId.'|max:255',
            'role' => ['sometimes', Rule::in(['admin', 'user', 'moderator'])],
            'status' => ['sometimes', Rule::in(['active', 'inactive', 'pending'])],
            'profile' => 'sometimes|array',
            'profile.bio' => 'sometimes|string|max:1000',
            'profile.phone' => 'sometimes|string|max:20|regex:/^\+?[1-9]\d{1,14}$/',
            'profile.date_of_birth' => 'sometimes|date|before:today',
            'profile.gender' => ['sometimes', Rule::in(['male', 'female', 'other', 'prefer_not_to_say'])],
            'preferences' => 'sometimes|array',
            'preferences.notifications' => 'sometimes|boolean',
            'preferences.theme' => ['sometimes', Rule::in(['light', 'dark', 'auto'])],
            'preferences.language' => ['sometimes', Rule::in(['en', 'es', 'fr', 'de', 'it'])],
            'address' => 'sometimes|array',
            'address.street' => 'required_with:address|string|max:255',
            'address.city' => 'required_with:address|string|max:100',
            'address.state' => 'required_with:address|string|max:100',
            'address.postal_code' => 'required_with:address|string|max:20',
            'address.country' => 'required_with:address|string|size:2',
            'tags' => 'sometimes|array|max:10',
            'tags.*' => 'string|max:50',
            'metadata' => 'sometimes|json',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'This email address is already registered.',
            'profile.phone.regex' => 'Please enter a valid phone number.',
            'profile.date_of_birth.before' => 'Date of birth must be in the past.',
            'address.country.size' => 'Country code must be exactly 2 characters.',
            'tags.max' => 'You can only have up to 10 tags.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'profile.bio' => 'biography',
            'profile.phone' => 'phone number',
            'profile.date_of_birth' => 'date of birth',
            'address.street' => 'street address',
            'address.postal_code' => 'postal code',
            'preferences.notifications' => 'notification preferences',
        ];
    }
}
