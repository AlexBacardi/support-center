<?php

namespace App\Http\Requests\Other;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:5'],
            'descr' => ['required', 'string', 'min:8'],
            'priority_id' => ['required'],
            'files' => ['nullable', 'array'],
            'files.*' => ['mimes:png,jpg,jpeg,doc,docx,pdf'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Тема',
            'descr' => 'Описание',
            'priority_id' => 'Приоритет',
        ];
    }
}
