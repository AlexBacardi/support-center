<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'min:4'],
            'name' => ['required', 'string', 'min:2'],
            'avatar' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'banned_until' => ['nullable', 'date'],
            'role_id'=> ['required',],
        ];
    }

    public function attributes()
    {
        return [
            'avatar' => 'Аватар',
        ];
    }
}
