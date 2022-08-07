<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'number' => 'required|string|unique:products,number',
            'description' => 'nullable',
            'content' => 'nullable',
            'preview_image' => 'required|file',
            'price' => 'required|nullable',
            'count' => 'required|nullable',
            'is_published' => 'nullable',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
