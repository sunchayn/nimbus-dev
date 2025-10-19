<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|max:255|confirmed',
            'password_confirmation' => 'required|string|min:8|max:255',
            'role' => ['required', Rule::in(['admin', 'user', 'moderator'])],
            'status' => ['nullable', Rule::in(['active', 'inactive', 'pending'])],
            'profile' => 'nullable|array',
            'profile.bio' => 'nullable|string|max:1000',
            'profile.phone' => 'nullable|string|max:20|regex:/^\+?[1-9]\d{1,14}$/',
            'profile.date_of_birth' => 'nullable|date|before:today',
            'profile.gender' => ['nullable', Rule::in(['male', 'female', 'other', 'prefer_not_to_say'])],
            'preferences' => 'nullable|array',
            'preferences.notifications' => 'nullable|boolean',
            'preferences.theme' => ['nullable', Rule::in(['light', 'dark', 'auto'])],
            'preferences.language' => ['nullable', Rule::in(['en', 'es', 'fr', 'de', 'it'])],
            'address' => 'nullable|array',
            'address.street' => 'required_with:address|string|max:255',
            'address.city' => 'required_with:address|string|max:100',
            'address.state' => 'required_with:address|string|max:100',
            'address.postal_code' => 'required_with:address|string|max:20',
            'address.country' => 'required_with:address|string|size:2',
            'tags' => 'nullable|array|max:10',
            'tags.*' => 'string|max:50',
            'metadata' => 'nullable|json',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'This email address is already registered.',
            'password.confirmed' => 'Password confirmation does not match.',
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
