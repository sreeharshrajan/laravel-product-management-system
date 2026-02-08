<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\UserRole;

class UserUpdateRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // When updating, we need to ignore the current user's email uniqueness check.
        // We assume the route parameter is named 'user' based on resource naming conventions,
        // but since we updated routes/admin.php to use 'parameters' => ['users' => 'id'],
        // we might access the ID via $this->route('id') or $this->id since parameter name is 'id'.
        
        $userId = $this->route('id');

        return [
            'name' => 'sometimes|string|max:255',
            'email' => ['sometimes', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'password' => 'nullable|string|min:8',
            'role' => ['sometimes', Rule::enum(UserRole::class)],
        ];
    }
}
