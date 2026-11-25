<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3'],
            'author' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'published_year' => ['required', 'integer', 'between:1000,2100'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
