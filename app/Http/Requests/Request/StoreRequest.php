<?php

namespace App\Http\Requests\Request;

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
            'descr' => ['required', 'string', 'min:15'],
            'site_id' => ['required', 'min:6'],
            'satellite_id' => ['required'],
            'priority_id' => ['required'],
            'files' => ['nullable', 'mimes:png,jpg,jpeg,doc,docx,pdf'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Тема',
            'descr' => 'Описание',
            'satellite_id' => 'Выберите спутник',
            'priority_id' => 'Приоритет',
        ];
    }
}
