<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Validator;

class ProfileUpdateRequest extends FormRequest
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
        return [
            'name' => ['sometimes', 'required', 'string', 'max:100'],
            'current_password' => ['nullable', 'required_with:password'],
            'password' => ['sometimes', 'nullable', 'confirmed', Password::min(8)->numbers()->symbols()->mixedCase()->uncompromised()],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->filled('password') && ! Hash::check($this->input('current_password'), $this->user()->password)) {
                    $validator->errors()->add('current_password', 'The provided current password is incorrect');
                }
            },
        ];
    }
}
